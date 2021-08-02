
<?php
 require('../includes/dbinfo.php');
// ?user=user&pass=pass
 
$user = isset($_GET['user']) ? $_GET['user'] : '';
$pass = isset($_GET['key']) ? $_GET['key'] : '';

$query11 = mysqli_query($dbconnect, "SELECT streamkey FROM stream_profiles WHERE userid='$user'")
		              or die (mysqli_error($dbconnect));
                                
           $query = mysqli_query($dbconnect, "SELECT username, streamkey, userid FROM profile WHERE userid='$user'")
		              or die (mysqli_error($dbconnect));
                  
         while ($row = mysqli_fetch_array($query)) {
         
             $streamkey = strtolower($row['username']);
             
             $userid1 = strtolower($row['userid']);
             $datakey = $row['streamkey'];
         
         }              
  
  
  $json11 = mysqli_fetch_all ($query11, MYSQLI_ASSOC);
    $row11 = array_column($json11,"streamkey");  
 
if (empty($user) || empty($pass)) {
    echo "wrong query input";
    header('HTTP/1.0 404 Not Found');
    exit();
}
 
$saveuser = $userid1;
$savepass = $datakey;
 
if (strcmp($user, $saveuser) == 0 && strcmp($pass, $savepass) == 0) {
    echo "Username and Key OK";
    
    //exec("php play.php $user");
} else {
    echo "Username or Key wrong";
    header('HTTP/1.0 404 Not Found');
    exit();
}
 
?>
