<?php

$DBSERVER = "localhost";
$DBUSERNAME = "root";
$DBPASSWORD = "";
$DBNAME = "useraccounts";


$conn = mysqli_connect($DBSERVER, $DBUSERNAME, $DBPASSWORD, $DBNAME);

if ($conn === false){
    die("Error: Connection failed." . mysqli_connect_error());
}
?>