<?php 
include_once('config.php');
$user = mysqli_query($conn, "select * from tbuser");
$id = isset($_GET['id'])?$_GET['id']:"";
if($id!=""){
    $hapus = mysqli_query($conn,"delete from tbuser where iduser=$id");
    if($hapus){
        echo "<script>alert('hapus berhasil');location.href='?hal=tampiluser';</script>";
    }
}
?>
<a href="?hal=tambahuser">Tambah user</a>
<br>
<br>
<table border="1" width="100%" cellspacing=0 cellspading=0>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Edit</th>
        <th>Hapus</th>
    </tr>
    <?php 
    $no =1;
    while($baris = mysqli_fetch_array($user)){
?>
 <tr>
    <td><?=$no++?></td>
    <td><?=$baris['nama_user']?></td>
    <td><?=$baris['username']?></td>
    <td>
        <a href="?hal=edituser&id=<?=$baris['iduser']?>">Edit</a>
    </td>
    <td>
        <a href="?hal=tampiluser&id=<?=$baris['iduser']?>" onclick="return confirm('yakin bro akan dihapus');">Hapus</a>
    </td>
 </tr>  
<?php  
 } 
 ?>
</table>