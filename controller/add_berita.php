<?php

session_start();

$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("Y-m-d H:i:s");
$id = $_POST['id'];
$penulis = $_SESSION['username'];

require_once("../config.php");


$result = mysqli_query($conn, "INSERT INTO berita(judul,deskripsi,tanggal,user_id,penulis) VALUES('$judul','$deskripsi','$tanggal','$id','$penulis')") or die(mysqli_error($conn));

header("location: ../index.php");
