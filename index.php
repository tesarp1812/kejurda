<?php
// memanggil file koneksi dan file proses
require 'config.php';
include 'proses_anggota.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota</title>
    <!-- link style menggunakan bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- mengatur ukuran halaman website -->
    <div class="container-sm">
        <br>
        <h1 class="text-center">
            DATABASE KEJURDA
        </h1>

        <!-- membuat tombol untuk mengarahkan ke halaman input data Anggota -->
        <div class="col text-start">
            <a class="btn btn-primary" href="anggota.php">Anggota</a>
        </div>

         <!-- membuat tombol untuk mengarahkan ke halaman input data Anggota -->
         <div class="col text-start">
            <a class="btn btn-primary" href="barang.php">Barang</a>
        </div>

         <!-- membuat tombol untuk mengarahkan ke halaman input data Anggota -->
         <div class="col text-start">
            <a class="btn btn-primary" href="peminjaman.php">Peminjaman</a>
        </div>


       
        </div>
    </div>
    </div>


    </div>

</body>

</html>