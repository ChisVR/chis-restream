<?php
include "common.php";

session_start();
try
{
	$dbh = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $username, $password);
} catch(PDOException $e)
{
	http_response_code(401);
	trigger_error($e->getMessage());
	die("Database error!");
}

if (empty($_SESSION['user']["username"])) {
	header("location: ../login.php");
}
$uname = $_SESSION['user']["username"];


try
{
	$sth = $dbh->prepare("SELECT streamkey FROM ".$usertablename." WHERE username = :username");
	$sth->execute(array("username" => $uname));
	$row = $sth->fetch();
} catch(PDOException $e)
{
	http_response_code(401);
	trigger_error($e->getMessage());
	die("Database error!");
}


header('Location: https://restream.chisdealhd.co.uk/user/channels.php');

?>
