<?php

include '../includes/functions.php';

include '../includes/dbinfo.php';

if (
    !isAdmin() &&
    !isMOD() &&
    !isSTREAMER() &&
    !isUser() &&
    !isDONATOR() &&
    !isPREMIUM() &&
    !isLEGEND() &&
    !isMEGA()
) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}


$id=$_REQUEST['id'];

$query = "DELETE FROM stream_profiles WHERE id=$id"; 

$result = mysqli_query($dbconnect,$query) or die ( mysqli_error());

header("Location: channels.php"); 

?>