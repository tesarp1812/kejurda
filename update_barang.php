<?php
// memanggil file koneksi dan file proses
include 'config.php';
include 'proses_barang.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Siswa</title>

    <!-- link style menggunakan bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Mengatur ukuran tampilan -->
    <div class="container-sm">
        <br>
        
        <div class="text-center">
            <h4>Form Update </h4>
            <br>
        </div>
        <div class="col text-start">
            <a class="btn btn-warning" href="barang.php">Kembali</a>
        </div>
        <!-- Membuat card -->
        <div class="card">
            <form method="POST">
                <div class="card-header text-center">
                    <div class="row">
                        <div class="col-11 text-start">
                            <h4>Form Update </h4>
                        </div>
                        <div class="col-1 text-end">
                            <a class="btn-close" aria-label="Close" href="barang.php"></a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="card-body">
                        <?php
                            //mendapatkan nis dari url yang dikirim, menggunakan method GET:
                            $id_barang=$_GET['id_barang'];
                            //membuat query tampil data siswa berdasarkan nis yang dipilih
                            $query=mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id_barang'");
                            while($data=mysqli_fetch_array($query)){
                                //membuat variabel untuk menampung data siswa
                                $id_barang = $data['id_barang'];
                                $nama_barang = $data['nama_barang'];
                                $stok = $data['stok'];
                            }
                        ?>
                        <!-- menampilkan data pada inputan dengan mengatur value/ nilai yang telah disimpan dalam variabel: -->
                        <h6>ID : </h6>
                        <input type="text" name="id_barang" class="form-control" value="<?= $id_barang ?>" readonly><br>
                        
                        <h6>Nama Barang : </h6>
                        <input type="text" name="nama_barang" class="form-control" value="<?= $nama_barang ?>" required><br>
                        
                        <h6>Stok : </h6>
                        <input type="text" name="stok" class="form-control" value="<?= $stok ?>" required><br>
                        
                    </div>
                </div>
                <div class="card-footer text-center">
                    <!-- membuat tombol update dan akan dikirim ke file proses -->
                    <button class="btn btn-primary" type="submit" name="update-barang">Ubah</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>