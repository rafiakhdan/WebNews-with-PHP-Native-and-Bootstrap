<?php

require_once("../config.php");
session_start();

$id = $_POST['id'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$id_user = $_SESSION['id'];

$result = mysqli_query($conn, "UPDATE berita SET judul='$judul', deskripsi='$deskripsi'  WHERE id='$id'") or die(mysqli_error($conn));


header("Location: ../index.php");
