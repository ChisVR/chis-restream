<?php

  require('../includes/dbinfo.php');

  $useriddis = $_GET['user'];
  
  $query = mysqli_query($dbconnect, "SELECT username FROM profile WHERE userid='$useriddis'")
		              or die (mysqli_error($dbconnect));
                  
         while ($row = mysqli_fetch_array($query)) {
         
             $streamkey = strtolower($row['username']);
         
         } 
  $info = json_decode(shell_exec('ffprobe -v quiet -print_format json -show_streams https://apitube.chisdealhd.co.uk/server/hls/public/'.$streamkey.'.m3u8'));
  
  if ($info->streams[0]) {
  
    shell_exec("nohup php play.php $useriddis &");
    
    echo json_encode(array(
				"statusCode"=>200,
				"value"=>"YOU ARE LIVE"
		));
   
  } else {
    
    echo json_encode(array(
				 "statusCode"=>404,
				 "value"=>"NOT LIVE!"
		));
  
  }

?>