<?php
session_start();

/* script to connect fo Mandir Database and pick up neccesary Information to display on screen */
/* declare some relevant variables */
$hostname = "localhost";
$username = "kandrark_admin";
$passwordsc = "welcome@123";
$dbName = "kandrark_col_off_kandra";

$con = mysql_connect($hostname,$username,$passwordsc);
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db($dbName, $con);

?>