<?php

include_once("config.php");



session_start();

if (!isset($_SESSION['username'])) {
   header("Location: view/form_login.php");
}

$id = $_SESSION['id'];

$result = mysqli_query($conn, "SELECT * FROM berita WHERE user_id=$id ORDER BY id ASC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
   <title>Homepage</title>
</head>

<body>
   <!-- <a href="form_add.php">Add New User</a><br /><br /> -->

   <nav class="navbar navbar-expand-lg bg-primary text-uppercase sticky-top" id="mainNav">
      <div class="container">
         <a class="navbar-brand text-white" href="index.php">
            KreNews
         </a>
         <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mt-2 py-1 px-2 px-0 px-lg-3 rounded text-black bg-white d-lg-none w-md-25 ms-auto">
               <li><a class=" dropdown-item" href="controller/logout.php">Logout</a></li>
            </ul>
         </div>

         <ul class="navbar-nav ms-auto d-sm-none d-none d-md-none d-lg-flex">
            <li class="nav-item dropdown">
               <a class="nav-link py-3 px-0 px-lg-3 rounded text-white dropdown-toggle" href="#" role="button" id="navbarDarkDropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-person-circle px-2"></i>Hi, <?= $_SESSION['username'] ?>
               </a>
               <ul class="dropdown-menu " aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item" href="controller/logout.php">Logout</a></li>
               </ul>
            </li>
         </ul>
      </div>
   </nav>

   <div class="container">
      <div class="row mt-3">
         <h1>Berita Up to Date</h1>
      </div>
      <div class="row my-2">
         <div class="d-inline d-flex flex-row justify-content-between">
            <a class="btn btn-primary" href="view/form_add_berita.php" role="button"><i class="bi bi-plus"></i>Buat Berita Baru</a>
            <a class="btn btn-outline-warning" href="view/list_berita.php" role="button"><i class="bi bi-plus"></i>Lihat Semua Berita</a>
         </div>
      </div>
      <?php
      $i = 1;
      while ($berita = mysqli_fetch_array($result)) :
      ?>
         <div class="card mt-3">
            <div class="card-header">
               <p class="d-inline flex-row-reverse">
                  <a class="btn btn-danger btn-sm" href="controller/delete_berita.php?id=<?= $berita['id'] ?>">Hapus</a>
                  <a class="btn btn-warning btn-sm" href="view/form_edit.php?id=<?= $berita['id'] ?>">Edit</a>
               </p>
               <h6 class="d-inline ">Tanggal terbit : <?= $berita['tanggal'] ?></h6>
            </div>
            <div class="card-body">
               <h3 class="card-title"><?= $berita['judul'] ?></h3>
               <h6>Penulis : <?= $berita['penulis'] ?></h6>
               <p class="card-text"><?= substr_replace($berita['deskripsi'], "...", 230) ?></p>
               <a href="view/detail_berita.php?id=<?= $berita['id'] ?>" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
            </div>
         </div>
      <?php
         $i++;
      endwhile;
      ?>
   </div>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
</body>

</html>