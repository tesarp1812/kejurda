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
            <a class="btn btn-primary" href="index.php">HOME</a>
        </div>
       
        <div class="col text-start">
            <a class="btn btn-primary" href="tambah_anggota.php">Tambah Anggota</a>
        </div>




        <!-- membuat tampilan card -->
        <div class="card">
            <!-- card header: -->
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Data Anggota</h4>
            </div>
            <!-- card body -->
            <div class="card-body">
                <!-- membuat alert untuk menampilkan pesan (berhasil atau gagal)-->
                <?php
                    if (isset($_GET['hapus'])) {
                                            
                        if ($_GET['hapus']=='berhasil'){
                            echo"<div class='alert alert-success'><strong>Berhasil!</strong> Berhasil Menghapus Data Anggota!</div>";
                        }else if ($_GET['hapus']=='gagal'){
                            echo"<div class='alert alert-danger'><strong>Gagal!</strong> Gagal Menghapus Data Anggota!</div>";
                        }    
                    }  
                    if (isset($_GET['update'])) {
                                            
                        if ($_GET['update']=='berhasil'){
                            echo"<div class='alert alert-success'><strong>Berhasil!</strong> Berhasil Mengubah Data Anggota!</div>";
                        }else if ($_GET['update']=='gagal'){
                            echo"<div class='alert alert-danger'><strong>Gagal!</strong> Gagal Mengubah Data Anggota!</div>";
                        }    
                    }  
                ?>
                
                <!-- membuat tabel untuk menampilkan data dari database -->
                <table class="table table-striped">
                    <thead>
                    <tr>
                            <!-- membuat tabel header unuk nama kolom -->
                            <th scope="col">ID</th>
                            <th scope="col">Nama anggota</th>
                            <th scope="col">Divisi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <!-- tbody untuk menampilkan data dari database -->
                    <tbody>
                        <?php 
                        // membuat query untuk menampilkan data
                        $query = mysqli_query($koneksi,"SELECT * FROM anggota");
                        // membuat variabel $no untuk membuat nomor urut data
                        $no = 1;
                        // membuat variabel $count untuk menghitung jumlah data
                        $count = mysqli_num_rows($query);
                        // perulangan while, digunakan untuk menampilkan data dengan mysqli_fetch_assoc
                        while ($data = mysqli_fetch_assoc($query)) 
                        {
                            // menyimpan data dalam bentuk variabel agar mudah saat pemanggilan
                            $id_anggota = $data['id_anggota'];
                            $nama = $data['nama'];
                            $divisi = $data['divisi'];
                        ?>
                        <tr>
                            <!-- menampilkan data pada tabel dengan memanggil variabel -->
                          
                            <td><?= $id_anggota ?></td>
                            <td><?= $nama ?></td>
                            <td><?= $divisi ?></td>
                            <td>
                                <!-- Membuat form untuk mengirim id_anggota, yang digunakan untuk proses update dan delete -->
                                <form method="Post">
                                    <input type="hidden" name="id_anggota" value="<?= $id_anggota ?>">
                                    <a class="btn btn-primary" href="update_anggota.php?id_anggota=<?= $id_anggota ?>">Ubah</a>
                                    <button name="delete-anggota" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>

                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <h6>Jumlah Data Anggota : <?php echo $count; ?></h6>
            </div>
        </div>
    </div>
    </div>


    </div>

</body>

</html>