<?php 
require_once('config.php');
if(isset($_POST['update'])){
    extract($_POST);
    $update = mysqli_query($conn,"update tbsiswa set nis='$nis', nisn='$nisn',
    nama_siswa='$nama_siswa', alamat='$alamat', hp='$hp', agama='$agama', jk='$jk' where id=$id");
    var_dump($update);
    if($update){
    ?>
    <script>
        alert('simpan berhasil');
        location.href='?hal=tampil';
    </script>
        <?php 
        }else{
            echo "<script>alert('update GAGAL')</script";
            header("location:?hal=tampil");
        }
    } 

        $id = isset($_GET['id'])?$_GET['id']:"";
        if($id == ""){
            echo "<script>alert('data tidak ditemukan');location.href='?hal=tampil';</script";
        }else{
            $query = mysqli_query($conn,"SELECT * FROM tbsiswa WHERE id=$id");
            $baris = mysqli_fetch_array($query);
        }
 ?>
<html>
    <head>
        <title>Edit Data</title>
    </head>
    <body>
        <a href="?hal=tampil">Lihat Data</a>
        <br>
        <br>
        <form action="?hal=edit" method="post">
    <table>
        <input type="hidden" name="id" value="<?=$baris['id']?>">
        <tr>
          <td>NIS</td>
          <td><input type="text" name="nis" placeholder="Nomer Induk Siswa" maxlength="20" value="<?=$baris['nis']?>"></td>
    </tr>
    <tr>
            <td>NISN</td>
            <td><input type="text" name="nisn" placeholder="Nomer Induk Siswa Nasional" maxlength="10" value="<?=$baris['nisn']?>"></td>
          </tr>
         <tr>
        <td>nama siswa</td>
        <td><input type="text" name="nama_siswa" placeholder="Nama Siswa" maxlength="50" value="<?=$baris['nama_siswa']?>"></td>
    </tr>
    <tr>
        <td>alamat</td>
        <td><input type="text" name="alamat" placeholder="Alamat" value="<?=$baris['alamat']?>"></td>
    </tr>
        <tr>
        <td>HP</td>
        <td><input type="text" name="hp" placeholder="Nomor HP" maxlength="15" value="<?=$baris['hp']?>"></td>
    </tr>
    <tr>
        <td>Agama</td>
        <td>
            <select name="agama">
            <option <?=$baris['agama']=='islam'?'selected':''?> value="islam">islam</option>
            <option <?=$baris['agama']=='kristen'?'selected':''?> value="kristen">kristen</option>
            <option <?=$baris['agama']=='katholik'?'selected':''?> value="katholik">katholik</option>
            <option <?=$baris['agama']=='hindu'?'selected':''?> value="hindu">hindu</option>
            <option <?=$baris['agama']=='budha'?'selected':''?> value="budha">budha</option>
            <option <?=$baris['agama']=='konghucu'?'selected':''?> value="konghucu">konghucu</option>
    </select>
       </td>
        <tr>
            <td>Jenis kelamin</td>
            <td>
        <input <?=$baris['jk']=='L'?'checked':''?> type="radio" name="jk" value="LAKI-LAKI">Laki-Laki
        <input <?=$baris['jk']=='P'?'checked':''?> type="radio" name="jk" value="PEREMPUAN">Perempuan
    </td>
    <tr>
        <td><button type="submit" name="update">update</button></td>
        <td></td>
     </tr>
    </tr>
    </tr>
  </table>
    </form>
    </body>
</html> 