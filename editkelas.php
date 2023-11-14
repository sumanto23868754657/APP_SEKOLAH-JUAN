<?php 
require_once('config.php');
if(isset($_POST['update'])){
    extract($_POST);
    $update = mysqli_query($conn,"update tbkelas set nama_kelas='$nama_kelas',jurusan='$jurusan' where id=$id");
    var_dump($update);
    if($update){
    ?>
    <script>
        alert('simpan berhasil');
        location.href='?hal=tampilkelas';
    </script>
        <?php 
        }else{
            echo "<script>alert('update GAGAL')</script";
            header("location:?hal=tampilkelas");
        }
    } 

        $id = isset($_GET['id'])?$_GET['id']:"";
        if($id == ""){
            echo "<script>alert('data tidak ditemukan');location.href='?hal=tampilkelas';</script";
        }else{
            $query = mysqli_query($conn,"SELECT * FROM tbkelas WHERE id=$id");
            $baris = mysqli_fetch_array($query);
        }
 ?>
<html>
    <head>
        <title>Edit Data</title>
    </head>
    <body>
        <a href="?hal=tampilkelas">Lihat Data</a>
        <br>
        <br>
        <form action="?hal=editkelas" method="post">
    <table>
        <input type="hidden" name="id" value="<?=$baris['id']?>">
        <tr>
          <td><label for="nama_kelas">kelas</label></td>
          <td><input type="text" name="nama_kelas" placeholder="kelas" maxlength="20" value="<?=$baris['nama_kelas']?>"></td>
    </tr>
    <tr>
        <td>jurusan</td>
        <td>
            <select name="jurusan">
            <option <?=$baris['jurusan']=='dkv'?'selected':''?> value="dkv">dkv</option>
            <option <?=$baris['jurusan']=='rpl'?'selected':''?> value="rpl">rpl</option>
            <option <?=$baris['jurusan']=='bd'?'selected':''?> value="bd">bd</option>
            <option <?=$baris['jurusan']=='ak'?'selected':''?> value="ak">ak</option>
            <option <?=$baris['jurusan']=='mp'?'selected':''?> value="mp">mp</option>
    </select>
       </td>
    </tr>
    <tr>
        <td><button type="submit" name="update">update</button></td>
    </tr>
  </table>
    </form>
    </body>
</html> 