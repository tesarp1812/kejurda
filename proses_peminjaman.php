<?php
include 'config.php';
//proses update data peminjaman
if(isset($_POST['update-peminjaman'])){
    $id_peminjaman= $_POST['id_peminjaman'];    
    $nama = $_POST['nama'];
    $divisi = $_POST['divisi'];

    $update = mysqli_query($koneksi, "UPDATE peminjaman SET nama='$nama', divisi='$divisi' where id_peminjaman=$id_peminjaman");

    if($update){
        echo 'Berhasil';
        header("location:peminjaman.php?update=berhasil");
    } else {
        echo 'Gagal';
        header("location:update_peminjaman.php?update=gagal");
    };
  

}

//proses insert data siswa
if(isset($_POST['add-peminjaman'])){

    $tgl_pinjam = $_POST['tgl_pinjam'];
    $id_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $id_anggota = $_POST['nama'];
    
    $input = mysqli_query($koneksi,"INSERT INTO peminjaman (tgl_pinjam, id_barang, jumlah, id_anggota) values (`$tgl_pinjam`, `$id_barang`, `$jumlah`, `$id_anggota`)");

    if($input){
        echo 'Berhasil';
        header("location:peminjaman.php?add=berhasil");
    } else {
        echo 'Gagal';
        header("location:tambah_peminjaman.php?add=gagal");
    };
      
   
}

//proses hapus data peminjaman
if(isset($_POST['delete-peminjaman'])){
    $id_peminjaman = $_POST['id_peminjaman'];

    $hapus = mysqli_query($koneksi,"delete from peminjaman where id_peminjaman='$id_peminjaman'");

    if($hapus){
        echo 'Berhasil';
        header("location:peminjaman.php?hapus=berhasil");
    } else {
        echo 'Gagal';
        header("location:peminjaman.php?hapus=gagal");
    };
  
}