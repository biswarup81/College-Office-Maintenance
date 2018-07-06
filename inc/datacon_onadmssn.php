<?php
session_start();

/* script to connect fo Mandir Database and pick up neccesary Information to display on screen */
/* declare some relevant variables */
$hostname = "online-admission.co.in";
$username = "onlinead_kandra";
$passwordsc = "#x9I@V1RBNhu";
$dbName = "onlinead_kandra";

$con = mysql_connect($hostname,$username,$passwordsc);
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db($dbName, $con);

?>