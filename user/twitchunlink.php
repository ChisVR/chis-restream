<?php
include('./../includes/dbinfo.php');
include('./../includes/functions.php');

$usernamedis = $_SESSION['user']['userid'];
$usertypedis = $_SESSION['user']['user_type'];

    $result = mysqli_query($dbconnect,"SELECT * FROM profile WHERE userid='$usernamedis'");

    $queryupdater = "UPDATE profile SET twitchusername=null, twitchuserid=null WHERE userid='$usernamedis'";
                    
    if (mysqli_query($dbconnect, $queryupdater)) {
        //printf('Record updated successfully');

            header("Location: https://apps.chisdealhd.co.uk/user/settings.php?unlinked=twitch&data=confirm");
            die();
    } else {
        //printf('Error updating record: ' . mysqli_error($con));
        header("Location: https://apps.chisdealhd.co.uk/user/settings.php?data=failed");
        die();
    }