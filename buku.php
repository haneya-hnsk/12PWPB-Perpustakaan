<?php
 require_once "koneksi.php";
 if(!isset($_SESSION['nama']) and 
!isset($_SESSION['password'])){
header("location:login.php");
 }
 $cr=$_GET['cr'];
 $aksi=$_GET['a'];
?>
<h3>Menu Buku</h3>
<div class="fhead">
 <a href="index.php?p=buku&a=input"><button>Tambah</button></a>
 <form>
 <input type="hidden" name="p" value="buku">
 <input type="text" name="cr" placeholder="cari data">
 <input type="submit" name="cari" value="cari">
 </form>
</div>
<?php if($aksi=="input"){?>
 <!--untuk form input-->
<form action="buku_aksi.php?p=buku" method="post">
 <fieldset>
<legend>Input Data</legend>
Kode Buku<br>
<input type="text" name="kode" placeholder="kode buku" 
><br>
Judul Buku<br>
<input type="text" name="judul" placeholder="judul buku" 
required><br>
Pengarang<br>
<input type="text" name="pengarang" 
placeholder="pengarang" required><br>
Penerbit<br>
<input type="text" name="penerbit" placeholder="penerbit" 
required><br>
Tahun Terbit<br>
<input type="text" name="tahun" placeholder="tahun terbit" 
required><br><br>
<input type="submit" name="insert" value="Simpan">
 </fieldset>
 </form>
<?php }else if($aksi=="edit"){

 $qr=mysqli_query($konek,"select * from buku where 
kode='$cr'");
 $dt=mysqli_fetch_array($qr);
?>
 <form action="buku_aksi.php?p=buku" method="post">
 <fieldset>
<legend>Edit Data</legend>
Kode Buku<br>
<input type="text" name="kode" placeholder="kode buku" 
value="<?=$dt['kode']?>" readonly required><br>
Judul Buku<br>
<input type="text" name="judul" placeholder="judul buku" 
value="<?=$dt['judul']?>" required><br>
Pengarang<br>
<input type="text" name="pengarang" 
placeholder="pengarang" value="<?=$dt['pengarang']?>" 
required><br>
Penerbit<br>
<input type="text" name="penerbit" placeholder="penerbit" 
value="<?=$dt['penerbit']?>" required><br>
Tahun Terbit<br>
<input type="text" name="tahun" placeholder="tahun terbit" 
value="<?=$dt['tahun_terbit']?>" required><br><br>
<input type="submit" name="update" value="Perbaharui">
 </fieldset>
 </form>
<?php }else{

 //apabila ada pencarian
 if(isset($cr)){
 $qr=mysqli_query($konek,"select * from buku where judul like 
'%$cr%' or tahun_terbit like '%$cr%' or penerbit like '%$cr%' or pengarang like '%$cr%'");
 }else{
 $qr=mysqli_query($konek,"select * from buku");
 }
 if(mysqli_num_rows($qr)>0){
?>
 <table border="1">
 <tr>
 <th>No</th>
 <th>Kode</th>
 <th>Judul</th>
 <th>Pengarang</th>
 <th>Penerbit</th>
 <th>Tahun</th>
 <th>Aksi</th>
 </tr>
<?php
 while($dt=mysqli_fetch_array($qr)){
?>
 <tr>
<td><?=++$no;?></td>
<td><?=$dt['kode'];?></td>
<td><?=$dt['judul'];?></td>
<td><?=$dt['pengarang'];?></td>
<td><?=$dt['penerbit'];?></td>
<td><?=$dt['tahun_terbit'];?></td>
<td>
 <a 
href="index.php?p=buku&a=edit&cr=<?=$dt['kode']?>"><button 
class="bt bt-edit">edit</button></a> 
 <a 
href="buku_aksi.php?p=buku&a=hapus&cr=<?=$dt['kode']?>" 
onclick="return confirm('yakin akan dihapus?')"><button 
class="bt bt-del">delete</button></a>
</td>
 </tr>
<?php }?>
 </table>
<?php }}?>