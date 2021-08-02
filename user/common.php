<?php
$host = "localhost";
$username = "";
$password = "";
$dbname = "restream";
$usertablename = "profile";
$streamurl = "rtmp://localhost/public";
$baseurl = "https://restream.chisdealhd.co.uk/user/";

function genkey() {
	return bin2hex(openssl_random_pseudo_bytes(10));
}
?>
