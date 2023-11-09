<?php

require "koneksi.php";
 $qr=mysqli_query($konek,"select count(judul) as angkabuku from buku");
 $dt=mysqli_fetch_array($qr);

 echo 'Total Buku  : '. $dt['angkabuku'];
 echo "<br>";


 $qr=mysqli_query($konek,"select count(nis) as siswa from siswa");
 $dt=mysqli_fetch_array($qr);


 echo 'Siswa Buku  : '. $dt['siswa'];
 echo "<br>";


 $qr=mysqli_query($konek,"select count(nama) as pengguna from pengguna");
 $dt=mysqli_fetch_array($qr);

 echo 'Pengguna Buku  : '. $dt['pengguna'];
 echo "<br>";
 echo "<br>";


 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <input type="button" value="print" onclick="window.print()">
</body>
</html>
