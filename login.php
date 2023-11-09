<?php
session_start();
if(isset($_SESSION['nama']) and isset($_SESSION['password'])){
 header("location:index.php");
}
if(isset($_POST['login'])){
 require_once "koneksi.php";
 $nama=$_POST['nama'];
 $password=$_POST['password'];
 $qr=mysqli_query($konek,"select * from pengguna 
 Where nama='$nama' and sandi='$password'");
 $cek=mysqli_num_rows($qr);
 if($cek>0){
$dt=mysqli_fetch_array($qr);
$_SESSION['nama']=$nama;
$_SESSION['password']=$password;
$_SESSION['level']=$dt['level'];
header("location:index.php");
 }
}
?>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="gaya.css">
</head>
<body>
 <div class="login">
<h2>Login</h2>
<form method="post">
 Nama<br>
 <input type="text" name="nama"><br>
 Password<br>
 <input type="password" name="password"><br><br>
 <input type="submit" name="login" value="masuk"
class="bt bt-login">
</form>
 </div>
</body>
</html>