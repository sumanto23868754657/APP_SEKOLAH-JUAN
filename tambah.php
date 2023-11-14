<?php 
require_once('config.php');
if(isset($_POST['simpan'])){
    extract($_POST);
    $insert = mysqli_query($conn,"insert into tbsiswa values(null,'$nis','$nisn','$nama_siswa','$alamat','$hp','$agama','$jk')");
    if($insert){
 ?>
        <script>
        alert('simpan berhasil');
        location.href='?hal=tampil';
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
    <a href="?hal=tampil">Kembali Ke Home</a>
    <br>
    <br>
    <form action="?hal=tambah" method="post">
        <table>
            <tr>
                <td>NIS</td>
                <td><input type="text" name="nis" placeholder="Nomer Induk Siswa" maxlength="20"></td>
</tr>
                <tr>
                    <td>NISN</td>
                    <td><input type="text" name="nisn" placeholder="Nomer Induk Siswa Nasional" maxlength="10"></td>
</tr>
                <td>nama siswa</td>
                <td><input type="text" name="nama_siswa" placeholder="Nama Siswa" maxlength="10"></td>
</tr>
                <tr>
                <td>alamat</td>
                <td><input type="text" name="alamat" placeholder="Alamat" maxlength="50"></td>
</tr>
<tr>
                <td>hp</td>
                <td><input type="text" name="hp" placeholder="Nomer HP" maxlength="15"></td>
                </tr>
                <tr>
                <td>agama</td>
                <td>
                    <select name="agama">
                    <option value="">==pilih agama==</option>
                    <option value="islam">islam</option>
                    <option value="kristen">kristen</option>
                    <option value="katholik">katholik</option>
                    <option value="hindu">hindu</option>
                    <option value="budha">budha</option>
                    <option value="konghucu">konghucu</option>
                </select>
                </td>
                <tr>
                    <td>jenis kelamin</td>
                    <td>
                    <input type="radio" name="jk" value="LAKI-LAKI">laki-laki
                    <input type="radio" name="jk" value="PEREMPUAN">perempuan">
                    </td>
                <tr>
                <td><button type="submit" name="simpan" value="simpan">simpan</button></td>
                <td><button type="reset" name="reset">reset</button></td>
            </tr>
        </tr>
        </tr>
      </table>
    </from>
  </body>
</html>