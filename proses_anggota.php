<?php
//proses update data anggota
if(isset($_POST['update-anggota'])){
    $id_anggota= $_POST['id_anggota'];    
    $nama = $_POST['nama'];
    $divisi = $_POST['divisi'];

    $update = mysqli_query($koneksi, "UPDATE anggota SET nama='$nama', divisi='$divisi' where id_anggota=$id_anggota");

    if($update){
        echo 'Berhasil';
        header("location:anggota.php?update=berhasil");
    } else {
        echo 'Gagal';
        header("location:update_anggota.php?update=gagal");
    };
  

}

//proses insert data siswa
if(isset($_POST['add-anggota'])){
 
    $nama = $_POST['nama'];
    $divisi = $_POST['divisi'];
    $input = mysqli_query($koneksi,"INSERT INTO anggota values ('','$nama','$divisi')");

    if($input){
        echo 'Berhasil';
        header("location:anggota.php?add=berhasil");
    } else {
        echo 'Gagal';
        header("location:tambah_anggota.php?add=gagal");
    };
      
   
}

//proses hapus data anggota
if(isset($_POST['delete-anggota'])){
    $id_anggota = $_POST['id_anggota'];

    $hapus = mysqli_query($koneksi,"delete from anggota where id_anggota='$id_anggota'");

    if($hapus){
        echo 'Berhasil';
        header("location:anggota.php?hapus=berhasil");
    } else {
        echo 'Gagal';
        header("location:anggota.php?hapus=gagal");
    };
  
}