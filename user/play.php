<?php

require('../includes/dbinfo.php');
					$user = $argv[1];

		              $query11 = mysqli_query($dbconnect, "SELECT streamkey FROM stream_profiles WHERE userid='$user'")
		              or die (mysqli_error($dbconnect));
                                
           $query = mysqli_query($dbconnect, "SELECT username FROM profile WHERE userid='$user'")
		              or die (mysqli_error($dbconnect));
                  
         while ($row = mysqli_fetch_array($query)) {
         
             $streamkey = strtolower($row['username']);
         
         }              
  
  
  $json11 = mysqli_fetch_all ($query11, MYSQLI_ASSOC);
    $row11 = array_column($json11,"streamkey");  


$streamerURL = "https://apitube.chisdealhd.co.uk/"; // change it to your streamer URL
// optional you can change the log file location here
$logFileLocation = '/var/www/tmp/';

/**
 * $separateRestreams if it is set to true the script will use one FFMPEG command/process for each restream, otherwise will use only one for all streams
 * all in one FFMPEG command will save you CPU and other resources, but will make harder to find issues
 */
$separateRestreams = false;

// optional you can change the default FFMPEG
//$ffmpegBinary = '/usr/bin/ffmpeg';
$ffmpegBinary = '/usr/local/bin/ffmpeg';

/*
 * DO NOT EDIT AFTER THIS LINE
 */

if(!file_exists($ffmpegBinary)){
    $ffmpegBinary = '/usr/bin/ffmpeg';
    if(!file_exists($ffmpegBinary)){
        $ffmpegBinary = '/usr/local/bin/ffmpeg';
    }
}

set_time_limit(300);
ini_set('max_execution_time', 300);

$logFileLocation = rtrim($logFileLocation, "/") . '/';
$logFile = $logFileLocation . "ffmpeg_{users_id}_" . date("Y-m-d-h-i-s") . ".log";

error_log("Restreamer.json.php start");
$whichffmpeg = whichffmpeg();
if($whichffmpeg!==$ffmpegBinary){
    error_log("Restreamer.json.php WARNING you are using a different FFMPEG $whichffmpeg!==$ffmpegBinary");
}

//$request = file_get_contents("php://input");

$request = '{"m3u8": "https://apitube.chisdealhd.co.uk/server/hls/public/'.$streamkey.'.m3u8", "users_id": "17", "restreamsDestinations": '. json_encode($row11,true) . '}';

error_log("Restreamer.json.php php://input {$request}");
$robj = json_decode($request);

$obj = new stdClass();
$obj->error = true;
$obj->msg = "";
$obj->streamerURL = $streamerURL;
$obj->pid = array();
$obj->logFile = str_replace('{users_id}', $robj->users_id, $logFile);


if (empty($robj->restreamsDestinations) || !is_array($robj->restreamsDestinations)) {
    $obj->msg = "There are no restreams Destinations";
    error_log("Restreamer.json.php ERROR {$obj->msg}");
    die(json_encode($obj));
}
error_log("Restreamer.json.php Found " . count($robj->restreamsDestinations) . " destinations: " . json_encode($robj->restreamsDestinations));


$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  

ignore_user_abort(true);
ob_start();
header("Connection: close");
@header("Content-Length: " . ob_get_length());
ob_end_flush();
flush();

if (empty($separateRestreams)) {
    error_log("Restreamer.json.php all in one command ");
    $obj->pid[] = startRestream($robj->m3u8, $robj->restreamsDestinations, $obj->logFile);
} else {
    error_log("Restreamer.json.php separateRestreams " . count($robj->restreamsDestinations));
    foreach ($robj->restreamsDestinations as $key => $value) {
        sleep(0.5);
        $obj->pid[] = startRestream($robj->m3u8, array($value), str_replace(".log", "_{$key}.log", $obj->logFile));
    }
}
$obj->error = false;

error_log("Restreamer.json.php finish " . json_encode($obj));
die(json_encode($obj));

function clearCommandURL($url) {
    return preg_replace('/[^0-9a-z:.\/_&?=-]/i', "", $url);
}

function isURL200($url, $forceRecheck = false) {
    global $_isURL200;
    $name = "isURL200" . DIRECTORY_SEPARATOR . md5($url);
    if (empty($forceRecheck)) {
        $result = ObjectYPT::getCache($name, 30);
        if (!empty($result)) {
            $object = _json_decode($result);
            return $object->result;
        }
    }


    $object = new stdClass();
    $object->url = $url;
    $object->forceRecheck = $forceRecheck;

    //error_log("isURL200 checking URL {$url}");
    $headers = @get_headers($url);
    if (!is_array($headers)) {
        $headers = array($headers);
    }

    $object->result = false;
    foreach ($headers as $value) {
        if (
                strpos($value, '200') ||
                strpos($value, '302') ||
                strpos($value, '304')
        ) {
            $object->result = true;
            break;
        } else {
            //_error_log('isURL200: '.$value);
        }
    }

    return $object->result;
}

function make_path($path) {
    if (substr($path, -1) !== DIRECTORY_SEPARATOR) {
        $path = pathinfo($path, PATHINFO_DIRNAME);
    }
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
    }
}

function startRestream($m3u8, $restreamsDestinations, $logFile, $tries = 1) {
    global $ffmpegBinary;
    if (empty($restreamsDestinations)) {
        error_log("Restreamer.json.php ERROR empty restreamsDestinations");
        return false;
    }
    $m3u8 = clearCommandURL($m3u8);

    killIfIsRunning($m3u8);
    if($tries === 1){
        sleep(3);
    }
    if (!isURL200($m3u8, true)) {
        if ($tries > 20) {
            error_log("Restreamer.json.php tried too many times, we could not find your stream URL");
            return false;
        }
        error_log("Restreamer.json.php URL ($m3u8) is NOT ready. trying again ({$tries})");
        sleep($tries);
        return startRestream($m3u8, $restreamsDestinations, $logFile, $tries + 1);
    }
    /*
      $command = "ffmpeg -i {$m3u8} ";
      foreach ($restreamsDestinations as $value) {
      $value = clearCommandURL($value);
      $command .= ' -max_muxing_queue_size 1024 -f flv "' . $value . '" ';
      }
     * 
     */
    if (count($restreamsDestinations) > 1) {
        $command = "{$ffmpegBinary} -re -i \"{$m3u8}\" ";
        foreach ($restreamsDestinations as $value) {
            if(!isOpenSSLEnabled() && preg_match("/rtpms:/i", $value)){
                error_log("Restreamer.json.php ERROR #1 FFMPEG openssl is not enabled, ignoring $value ");
                continue;
            }
            $value = clearCommandURL($value);
            $command .= ' -max_muxing_queue_size 1024 -acodec copy -bsf:a aac_adtstoasc -vcodec copy -f flv "' . $value . '" ';
        }
    } else {
        if(!isOpenSSLEnabled() && preg_match("/rtpms:/i", $restreamsDestinations[0])){
            error_log("Restreamer.json.php ERROR #2 FFMPEG openssl is not enabled, ignoring {$restreamsDestinations[0]} ");
        }else{
            $command = "ffmpeg -re -i \"{$m3u8}\" -max_muxing_queue_size 1024 -acodec copy -bsf:a aac_adtstoasc -vcodec copy -f flv \"{$restreamsDestinations[0]}\"";
        }
    }
    if(empty($command) || !preg_match("/-f flv/i", $command)){
        error_log("Restreamer.json.php ERROR command is empty ");
    }else{
        error_log("Restreamer.json.php startRestream, check the file ($logFile) for the log");
        make_path($logFile);
        file_put_contents($logFile, $command . PHP_EOL);
        exec('nohup ' . $command . '  2>> ' . $logFile . ' > /dev/null &');
        error_log("Restreamer.json.php startRestream finish");
    }
    return true;
}

$isOpenSSLEnabled = null;
function isOpenSSLEnabled() {
    global $isOpenSSLEnabled, $ffmpegBinary;
    if(isset($isOpenSSLEnabled)){
        return $isOpenSSLEnabled;
    }
    exec("{$ffmpegBinary} 2>&1", $output, $return_var);
    foreach ($output as $value) {
        if (preg_match("/configuration:.*--enable-openssl/i", $value)) {
            $isOpenSSLEnabled = true;
            return $isOpenSSLEnabled;
        }
    }
    $isOpenSSLEnabled = false;
    return $isOpenSSLEnabled;
}

function whichffmpeg() {
    exec("which ffmpeg 2>&1", $output, $return_var);
    return @$output[0];
}

function getProcess($m3u8){
    $m3u8 = clearCommandURL($m3u8);
    global $ffmpegBinary;
    exec("ps -ax 2>&1", $output, $return_var);
    //error_log("Restreamer.json.php:getProcess ". json_encode($output));
    foreach ($output as $value) {
        $pattern = "/^([0-9]+).*".replaceSlashesForPregMatch($ffmpegBinary).".*".replaceSlashesForPregMatch($m3u8)."/i";
        //error_log("Restreamer.json.php:getProcess {$pattern}");
        if (preg_match($pattern, trim($value), $matches)) {
            return $matches;
        }
    }
    return false;
}

function killIfIsRunning($m3u8){
    $process = getProcess($m3u8);
    error_log("Restreamer.json.php killIfIsRunning checking if there is a process running for {$m3u8} ");
    if(!empty($process)){
        error_log("Restreamer.json.php killIfIsRunning there is a process running for {$m3u8} ". json_encode($process));
        $pid = intval($process[1]);
        if(!empty($pid)){
            error_log("Restreamer.json.php killIfIsRunning killing {$pid} ");
            exec("kill -9 {$pid} 2>&1", $output, $return_var);
            sleep(1);
        }
        return true;
    }else{
        error_log("Restreamer.json.php killIfIsRunning there is not a process running for {$m3u8} ");
    }
    return false;
}

function replaceSlashesForPregMatch($str){
    return str_replace('/', '.', $str);
}
