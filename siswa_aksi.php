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


mysqli_query($konek,"insert into siswa values 
('$_POST[nis]',
'$_POST[nama]',
'$_POST[jenis_kelamin]',
'$_POST[status]'
)");
 }
 //untuk update data
 if(isset($_POST['update'])){
mysqli_query($konek,"update siswa set
nama='$_POST[nama]',
jenis_kelamin='$_POST[jenis_kelamin]',
status='$_POST[status]',
where nis='$_POST[nis]'
");
 }
 //untuk hapus data
 if($aksi=='hapus'){
mysqli_query($konek,"delete from siswa where 
nis='$_GET[cr]'");
 }
 header("location:index.php?p=$hal");
?>