<?php
$dbHos  = "localhost";
$daUser = "root";
$dbPass = "";
$dbName = "crud";

$conn = mysqli_connect($dbHos, $daUser, $dbPass, $dbName);
if(!$conn){
    die("Somthing when wrong");
}