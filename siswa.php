<?php
 require_once "koneksi.php";
 if(!isset($_SESSION['nama']) and !isset($_SESSION['password'])){
header("location:login.php");
 }
 $cr=$_GET['cr'];
 $aksi=$_GET['a'];
?>
<h3>Menu siswa</h3>
<div class="fhead">
 <a href="index.php?p=siswa&a=input"><button>Tambah</button></a>
 <form>
 <input type="hidden" name="p" value="siswa">
 <input type="text" name="cr" placeholder="cari data">
 <input type="submit" name="cari" value="cari">
 </form>
</div>
<?php if($aksi=="input"){?>
<form action="siswa_aksi.php?p=siswa" method="post">
 <fieldset>
<legend>Input Data</legend>
nis siswa<br>
<input type="text" name="nis" placeholder="nis siswa" 
><br>
nama siswa<br>
<input type="text" name="nama" placeholder="nama siswa" 
required><br>
jenis_kelamin<br>
<input type="text" name="jenis_kelamin" 
placeholder="jenis_kelamin" required><br>
status<br>
<input type="text" name="status" placeholder="status" 
required><br>

<input type="submit" name="insert" value="Simpan">
 </fieldset>
 </form>
<?php }else if($aksi=="edit"){

 $qr=mysqli_query($konek,"select * from siswa where 
nis='$cr'");
 $dt=mysqli_fetch_array($qr);
?>
 <form action="siswa_aksi.php?p=siswa" method="post">
 <fieldset>
<legend>Edit Data</legend>
nis siswa<br>
<input type="text" name="nis" placeholder="nis siswa" 
value="<?=$dt['nis']?>" readonly required><br>
nama siswa<br>
<input type="text" name="nama" placeholder="nama siswa" 
value="<?=$dt['nama']?>" required><br>
jenis_kelamin<br>
<input type="text" name="jenis_kelamin" 
placeholder="jenis_kelamin" value="<?=$dt['jenis_kelamin']?>" 
required><br>
status<br>
<input type="text" name="status" placeholder="status" 
value="<?=$dt['status']?>" required><br>
<br>
<input type="submit" name="update" value="Perbaharui">
 </fieldset>
 </form>
<?php }else{

 if(isset($cr)){
 $qr=mysqli_query($konek,"select * from siswa where nama like 
'%$cr%' or status like '%$cr%' or jenis_kelamin like '%$cr%'");
 }else{
 $qr=mysqli_query($konek,"select * from siswa");
 }
 if(mysqli_num_rows($qr)>0){
?>
 <table border="1">
 <tr>
 <th>No</th>
 <th>nis</th>
 <th>nama</th>
 <th>jenis_kelamin</th>
 <th>status</th>
 <th>Aksi</th>
 </tr>
<?php
 while($dt=mysqli_fetch_array($qr)){
?>
 <tr>
<td><?=++$no;?></td>
<td><?=$dt['nis'];?></td>
<td><?=$dt['nama'];?></td>
<td><?=$dt['jenis_kelamin'];?></td>
<td><?=$dt['status'];?></td>
<td>
 <a 
href="index.php?p=siswa&a=edit&cr=<?=$dt['nis']?>"><button 
class="bt bt-edit">edit</button></a> 
 <a href="siswa_aksi.php?p=siswa&a=hapus&cr=<?=$dt['nis']?>" 
onclick="return confirm('yakin akan dihapus?')"><button 
class="bt bt-del">delete</button></a>
</td>
 </tr>
<?php } ?>


 </table>
<?php }}?>