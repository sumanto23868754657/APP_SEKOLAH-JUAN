<?php 
require_once('config.php');
if(isset($_POST['simpan'])){
    extract($_POST);
    $insert = mysqli_query($conn,"insert into tbkelas values(null,'$nama_kelas','$jurusan')");
    if($insert){
 ?>
        <script>
        alert('simpan berhasil');
        location.href='?hal=tampilkelas';
        </script>
     <?php
        
    }

} 
?>
<html>
<head>
    <title>Tambah Data</title>
</head>
<body>
    <a href="?hal=tampilkelas">Kembali Ke Home</a>
    <br>
    <br>
    <form action="?hal=tambahkelas" method="post">
        <table>
            <tr>
                <td>KELAS</td>
                <td><input type="text" name="nama_kelas" placeholder="kelas" maxlength="20"></td>
</tr>
                <td>
                    <select name="jurusan">
                    <option value="">==pilih jurusan==</option>
                    <option value="rpl">REKAYASA PERANGKAT LUNAK</option>
                    <option value="bd">BISNIS DIGITAL</option>
                    <option value="mp">MANAJEMEN PERKANTORAN</option>
                    <option value="dkv">DESAIN KOMUNIKASI VISUAL</option>
                    <option value="ak">AKUTANSI</option>
                </select>
                </td>
</tr>
<tr>
                <td><button type="submit" name="simpan" value="simpan">simpan</button></td>
                <td><button type="reset" name="reset">reset</button></td>
            </tr>
      </table>
    </from>
  </body>
</html>