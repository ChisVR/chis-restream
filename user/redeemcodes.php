 <?php
include('../includes/dbinfo.php');

      require_once('../includes/MCRcon.php');


$host = '54.39.122.225'; // Server host name or IP
$port = 8038;                      // Port rcon is listening on
$password = 'chisisacutie10000)*'; // rcon.password setting set in server.properties
$timeout = 3;                       // How long to timeout.

use Thedudeguy\Rcon;


$coupon_code=$_POST['coupon_code'];
$userid=$_POST['discordid'];
$todaydate = new DateTime("+1 month");

$result = mysqli_query($dbconnect,"SELECT * FROM profile WHERE userid='$userid'");
        
        if (mysqli_num_rows($result) > 0) {
        
        $logged_in_user = mysqli_fetch_assoc($result);
        
        
$query=mysqli_query($dbconnect,"select * from coupon_code where coupon_code='$coupon_code' and status=1");
$row=mysqli_fetch_array($query);
if (mysqli_num_rows($query)>0){

  if ($row['item'] == "Donator"){
    
    $item = "isDonator";
    
  } else if ($row['item'] == "Premium"){
    
    $item = "isPremium";
    
  } else if ($row['item'] == "Legend"){
    
    $item = "	isLegend";
    
  } else if ($row['item'] == "Mega"){
    
    $item = "isMega";
    
  } else if ($row['item'] == "Monthly"){
    
    $item = "isMonthSupporter";
    
    $date1month = $todaydate->format("d-m-Y-H:i");
    
    $date1monthformat = $todaydate->format("d-m-Y");
    
  }  else if ($row['item'] == "MinecraftAccess"){
    
    $item = "isMinecraftAccess";
    
    $date1month = $todaydate->format("d-m-Y-H:i");
    
    $date1monthformat = $todaydate->format("d-m-Y");
    
  }

  if ($logged_in_user[$item] == 0){
  //mysqli_query($dbconnect,"UPDATE coupon_code SET status=0 where coupon_code='$coupon_code'");
  
  if ($row['item'] == "Monthly"){
      mysqli_query($dbconnect,"UPDATE coupon_code SET status=0 where coupon_code='$coupon_code'");
      mysqli_query($dbconnect,"UPDATE profile SET ".$item."=1, monthlytime='$date1month' where userid='$userid'");
      
      	echo json_encode(array(
				"statusCode"=>200,
				"value"=>$row['item'],
        "dateexpires"=>$date1monthformat
			));
      
  } else if ($row['item'] == "MinecraftAccess"){
             
      if ($logged_in_user['MCName'] == null) { 
        echo json_encode(array("statusCode"=>210, "message"=> "MinecraftError"));
      } else {
        
        mysqli_query($dbconnect,"UPDATE coupon_code SET status=0 where coupon_code='$coupon_code'");
  
        mysqli_query($dbconnect,"UPDATE profile SET ".$item."=1, monthlytimemc='$date1month' where userid='$userid'");
      
        $rcon = new Rcon($host, $port, $password, $timeout);

        if ($rcon->connect())
        {
          $rcon->sendCommand("whitelist add ".$logged_in_user['MCName']);
        }
      
      	echo json_encode(array(
				  "statusCode"=>200,
				  "value"=>$row['item'],
          "dateexpires"=>$date1monthformat
			  ));
      
      }
      
      
      
  } else {
      mysqli_query($dbconnect,"UPDATE profile SET ".$item."=1 where userid='$userid'");
      
      	echo json_encode(array(
				"statusCode"=>200,
				"value"=>$row['item']
			));
  }

  
  
  
      } else {
      
        echo json_encode(array(
				"statusCode"=>200,
				"message"=> "Already got it"
			));
      
      }
}
else{
	echo json_encode(array("statusCode"=>201));
}
}
else{
	echo json_encode(array("statusCode"=>404));
}
?>