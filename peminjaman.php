<?php
// memanggil file koneksi dan file proses
require 'config.php';
include 'proses_peminjaman.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>
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

        <!-- membuat tombol untuk mengarahkan ke halaman input data peminjaman -->
        <div class="col text-start">
            <a class="btn btn-primary" href="index.php">HOME</a>
        </div>
       


        <div class="col text-start">
            <a class="btn btn-primary" href="tambah_peminjaman.php">Tambah Peminjaman</a>
        </div>


        <!-- membuat tampilan card -->
        <div class="card">
            <!-- card header: -->
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Data Peminjaman</h4>
            </div>
            <!-- card body -->
            <div class="card-body">
                <!-- membuat alert untuk menampilkan pesan (berhasil atau gagal)-->
                <?php
                    if (isset($_GET['hapus'])) {
                                            
                        if ($_GET['hapus']=='berhasil'){
                            echo"<div class='alert alert-success'><strong>Berhasil!</strong> Berhasil Menghapus Data Peminjaman!</div>";
                        }else if ($_GET['hapus']=='gagal'){
                            echo"<div class='alert alert-danger'><strong>Gagal!</strong> Gagal Menghapus Data Peminjaman!</div>";
                        }    
                    }  
                    if (isset($_GET['update'])) {
                                            
                        if ($_GET['update']=='berhasil'){
                            echo"<div class='alert alert-success'><strong>Berhasil!</strong> Berhasil Mengubah Data Peminjaman!</div>";
                        }else if ($_GET['update']=='gagal'){
                            echo"<div class='alert alert-danger'><strong>Gagal!</strong> Gagal Mengubah Data Peminjaman!</div>";
                        }    
                    }  
                ?>
                
                <!-- membuat tabel untuk menampilkan data dari database -->
                <table class="table table-striped">
                    <thead>
                    <tr>
                            <!-- membuat tabel header unuk nama kolom -->
                            <th scope="col">ID</th>
                            <th scope="col">Nama Anggota Peminjam</th>
                            <th scope="col">Divisi</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <!-- tbody untuk menampilkan data dari database -->
                    <tbody>
                        <?php 
                        // membuat query untuk menampilkan data
                        $query = mysqli_query($koneksi,"SELECT * FROM peminjaman 
                        INNER JOIN anggota ON peminjaman.id_anggota=anggota.id_anggota
                        INNER JOIN barang ON peminjaman.id_barang=barang.id_barang");
                        // membuat variabel $no untuk membuat nomor urut data
                        $no = 1;
                        // membuat variabel $count untuk menghitung jumlah data
                        $count = mysqli_num_rows($query);
                        // perulangan while, digunakan untuk menampilkan data dengan mysqli_fetch_assoc
                        while ($data = mysqli_fetch_assoc($query)) 
                        {
                            // menyimpan data dalam bentuk variabel agar mudah saat pemanggilan
                            $id_peminjaman = $data['id_peminjaman'];
                            $nama = $data['nama'];
                            $divisi = $data['divisi'];
                            $nama_barang = $data['nama_barang'];
                            $jumlah = $data['jumlah'];
                            $tgl_pinjam = $data['tgl_pinjam'];
                        ?>
                        <tr>
                            <!-- menampilkan data pada tabel dengan memanggil variabel -->
                          
                            <td><?= $id_peminjaman ?></td>
                            <td><?= $nama ?></td>
                            <td><?= $divisi ?></td>
                            <td><?= $nama_barang ?></td>
                            <td><?= $jumlah ?></td>
                            <td><?= $tgl_pinjam ?></td>
                            <td>
                                <!-- Membuat form untuk mengirim id_peminjaman, yang digunakan untuk proses update dan delete -->
                                <form method="Post">
                                    <input type="hidden" name="id_peminjaman" value="<?= $id_peminjaman ?>">
                                    <a class="btn btn-primary" href="update_peminjaman.php?id_peminjaman=<?= $id_peminjaman ?>">Ubah</a>
                                    <button name="delete-peminjaman" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>

                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <h6>Jumlah Data peminjaman : <?php echo $count; ?></h6>
            </div>
        </div>
    </div>
    </div>


    </div>

</body>


</html>