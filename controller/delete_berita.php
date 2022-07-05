<?php

require_once("../config.php");


$id = $_GET['id'];


$result = mysqli_query($conn, "DELETE FROM berita WHERE id=$id") or die(mysqli_error($conn));

header("Location:../index.php");
