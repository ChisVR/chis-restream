<?php
include('./../includes/dbinfo.php');
include('./../includes/functions.php');

error_reporting(0);
include '../oauth2/twitch/twitchlink.php';
$twitchtv = new TwitchTV;
//echo '<a href="'.$twitchtv->authenticate().'">Authenticate Me</a><br/>';

header("Location: ".$twitchtv->authenticate());
$ttv_code = $_GET['code'];
$access_token = $twitchtv->get_access_token($ttv_code);
$user_name = $twitchtv->authenticated_user($access_token);

$user_ttvid = $twitchtv->get_userid($user_name);

$usernamedis = $_SESSION['user']['userid'];
$usertypedis = $_SESSION['user']['user_type'];

if(isset($user_name)) {

    $result = mysqli_query($dbconnect,"SELECT * FROM profile WHERE userid='$usernamedis'");

    $queryupdater = "UPDATE profile SET twitchusername='$user_name', twitchuserid='$user_ttvid' WHERE userid='$usernamedis'";
                    
    if (mysqli_query($dbconnect, $queryupdater)) {
        //printf('Record updated successfully');

            header("Location: https://apps.chisdealhd.co.uk/user/settings.php?linked=twitch&data=confirm");
            die();
    } else {
        //printf('Error updating record: ' . mysqli_error($con));
        header("Location: https://apps.chisdealhd.co.uk/user/settings.php?data=failed");
        die();
    }

}
?>