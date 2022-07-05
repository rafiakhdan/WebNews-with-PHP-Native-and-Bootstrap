<?php
$databaseHost = 'localhost';
$databaseName = '3120500058';
$databaseUser = 'root';
$databasePass = '';


$conn = mysqli_connect($databaseHost, $databaseUser, $databasePass, $databaseName);
if (!$conn) {
   die("Connection error");
}
