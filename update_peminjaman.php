<?php
// memanggil file koneksi dan file proses
include 'config.php';
include 'proses_peminjaman.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data peminjaman</title>

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
            <a class="btn btn-warning" href="peminjaman.php">Kembali</a>
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
                            <a class="btn-close" aria-label="Close" href="peminjaman.php"></a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="card-body">
                        <?php
                            //mendapatkan nis dari url yang dikirim, menggunakan method GET:
                            $id_peminjaman=$_GET['id_peminjaman'];
                            //membuat query tampil data peminjaman berdasarkan nis yang dipilih
                            $query=mysqli_query($koneksi,"SELECT * FROM peminjaman 
                            INNER JOIN anggota ON peminjaman.id_anggota=anggota.id_anggota
                            INNER JOIN barang ON peminjaman.id_barang=barang.id_barang");
                            while($data=mysqli_fetch_array($query)){
                                //membuat variabel untuk menampung data peminjaman
                                $id_peminjaman = $data['id_peminjaman'];
                                $nama = $data['nama'];
                                $divisi = $data['divisi'];
                            }
                        ?>
                        <!-- menampilkan data pada inputan dengan mengatur value/ nilai yang telah disimpan dalam variabel: -->
                        <h6>ID : </h6>
                        <input type="text" name="id_peminjaman" class="form-control" value="<?= $id_peminjaman ?>" readonly><br>
                        
                        <h6>Nama peminjaman : </h6>
                        <input type="text" name="nama" class="form-control" value="<?= $nama ?>" required><br>
                        
                        <h6>Divisi : </h6>
                        <input type="text" name="divisi" class="form-control" value="<?= $divisi ?>" required><br>
                        
                    </div>
                </div>
                <div class="card-footer text-center">
                    <!-- membuat tombol update dan akan dikirim ke file proses -->
                    <button class="btn btn-primary" type="submit" name="update-peminjaman">Ubah</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>