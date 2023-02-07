`<?php
// memanggil file koneksi dan file proses
include 'config.php';
include 'proses_peminjaman.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman</title>

    <!-- link style menggunakan bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Mengatur ukuran tampilan -->
    <div class="container-sm">
        <br>
        
        <div class="text-center">
            <h4>Form Tambah Data Peminjaman</h4>
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
                            <h4>Form Tambah Data peminjaman</h4>
                        </div>
                        <div class="col-1 text-end">
                            <a class="btn-close" aria-label="Close" href="peminjaman.php"></a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="card-body">

                        <?php
                            //Validasi untuk menampilkan alert / pesan pemberitahuan
                            if (isset($_GET['add'])) {
                        
                                if ($_GET['add']=='berhasil'){
                                    echo"<div class='alert alert-success'><strong>Berhasil!</strong> Berhasil Menambah Data peminjaman!</div>";
                                }else if ($_GET['add']=='gagal'){
                                    echo"<div class='alert alert-danger'><strong>Gagal!</strong> Gagal Menambah Data peminjaman!</div>";
                                }    
                            }  
                        ?> 

                        <!-- Membuat inputan untuk dikirim ke file proses_peminjaman.php -->

                        <div class ="form-group">
                    <label >Tanggal Pinjam</label>
                    <input type="date"   name="tgl_pinjam"
                    class="form-control datepicker" placeholder="tgl_pinjam" required>
                    </div>

                        <label for="">Pilih Barang</label>
                   <select name="nama_barang" class="form-control">
                        <option value="" selected disabled>- Pilih Barang -</option>
                        <?php
                          $sql = "select * from barang";
                          $query = $koneksi->query($sql);
                          while ($data = mysqli_fetch_array($query)) {
                         ?>

                         <option value="<?php echo $data['id_barang'] ?>"><?php echo $data['nama_barang'] ?></option>
                         <?php } ?>
                      </select> 


                      <label for="">Jumlah</label>
                        <input type="text" name="jumlah" class="form-control" placeholder="jumlah" required><br>



                        <label for="">Pilih Anggota</label>
                   <select name="nama" class="form-control">
                        <option value="" selected disabled>- Pilih Anggota -</option>
                        <?php
                          $sql = "select * from anggota";
                          $query = $koneksi->query($sql);
                          while ($data = mysqli_fetch_array($query)) {
                         ?>

                         <option value="<?php echo $data['id_anggota'] ?>"><?php echo $data['nama'] ?></option>
                         <?php } ?>
                      </select>

                        
                
                <div class="card-footer text-center">
                    <button class="btn btn-primary" type="submit" name="add-peminjaman">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>`