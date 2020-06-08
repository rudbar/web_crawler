<?php
header("Content-Type: text/html;charset=UTF-8");
ob_start();

try {

	$con = new PDO("mysql:dbname=rudie_yantanyax;host=localhost;charset=utf8", "root", "");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

}
catch(PDOexception $e) {
	echo "Connection failed: " . $e->getMessage();
}
?>