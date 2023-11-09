<?php
 require_once "koneksi.php";
 if(!isset($_SESSION['nama']) and 
!isset($_SESSION['password'])){
 header("location:login.php");
 }
 $hal=$_GET['p'];
 $aksi=$_GET['a'];
 //untuk simpan data
 if(isset($_POST['insert'])){
mysqli_query($konek,"insert into buku values 
('$_POST[kode]',
'$_POST[judul]',
'$_POST[pengarang]',
'$_POST[penerbit]',
'$_POST[tahun]'
)");
 }
 //untuk update data
 if(isset($_POST['update'])){
mysqli_query($konek,"update buku set
judul='$_POST[judul]',
pengarang='$_POST[pengarang]',
penerbit='$_POST[penerbit]',
tahun_terbit='$_POST[tahun]' 
where kode='$_POST[kode]'
");
 }
 //untuk hapus data
 if($aksi=='hapus'){
mysqli_query($konek,"delete from buku where 
kode='$_GET[cr]'");
 }
 header("location:index.php?p=$hal");
?>