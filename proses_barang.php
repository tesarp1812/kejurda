<?php
//proses update data barang
if(isset($_POST['update-barang'])){
    $id_barang= $_POST['id_barang'];    
    $nama_barang = $_POST['nama_barang'];
    $stok = $_POST['stok'];

    $update = mysqli_query($koneksi, "UPDATE barang SET nama_barang='$nama_barang', stok='$stok' where id_barang=$id_barang");

    if($update){
        echo 'Berhasil';
        header("location:barang.php?update=berhasil");
    } else {
        echo 'Gagal';
        header("location:update_barang.php?update=gagal");
    };
  

}

//proses insert data siswa
if(isset($_POST['add-barang'])){
 
    $nama_barang = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $input = mysqli_query($koneksi,"INSERT INTO barang values ('','$nama_barang','$stok')");

    if($input){
        echo 'Berhasil';
        header("location:barang.php?add=berhasil");
    } else {
        echo 'Gagal';
        header("location:tambah_barang.php?add=gagal");
    };
      
   
}

//proses hapus data barang
if(isset($_POST['delete-barang'])){
    $id_barang = $_POST['id_barang'];

    $hapus = mysqli_query($koneksi,"delete from barang where id_barang='$id_barang'");

    if($hapus){
        echo 'Berhasil';
        header("location:barang.php?hapus=berhasil");
    } else {
        echo 'Gagal';
        header("location:barang.php?hapus=gagal");
    };
  
}