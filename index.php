<?php
 error_reporting(0);
 session_start();
 require_once "koneksi.php";
 if(!isset($_SESSION['nama']) and
!isset($_SESSION['password'])){
header("location:login.php");
 }
 $hal=$_GET['p'];
 $level=$_SESSION['level'];
?>
<head>
 <link rel='stylesheet' type='text/css' href='gaya.css'>
</head>
<body>
<div class="utama">
 <div class="atas">
 <img src="logo.png" class="logo" style="margin-left:10px;margin-right:10px;">
<h2>Sistem Informasi Perpustakaan</h2>
 </div>
 <div class="kiri">
 <!--menu tampilan-->
<ul>
 <li><a href='index.php'>Home</a></li>
 <li><a href='index.php?p=buku'>Buku</a></li>
 <?=($level=='admin')?"<li><a 
href='index.php?p=siswa'>Siswa</a></li>":""?>
 <?=($level=='admin')?"<li><a 
href='index.php?p=laporan'>Laporan</a></li>":""?>
 <li><a href='index.php?p=logout'>Keluar</a></li>
</ul>
 </div>


 <div class="kanan">
<!--isi tampilan-->
<?php
 if(isset($hal)){
 //memanggil file yang dibutuhkan
 require $hal.'.php';
 }else{
 echo "<h3>Dashboard Sistem</h3>Gunakan pilihan menu 
sebelah kiri untuk mengolah data";
 }
?>
 </div>
 </div>
</body>
