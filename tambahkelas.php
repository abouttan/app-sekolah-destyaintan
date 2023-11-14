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
        <a href="?hal=tampilkelas">Kembali ke home</a>
        <br>
        <br>
        <form action="?hal=tambahkelas" method="post">
            <table>
                <tr>
                    <td>KELAS</td>
                    <td><input type="text" name="nama_kelas" placeholder="Nama Kelas" maxlength="10"></td>
                </tr>   
                <tr>
                    <td>JURUSAN</td>
                    <td>
                        <select name="jurusan">
                            <option value="">==pilih jurusan==</option>
                            <option value="AK">Akuntansi</option>
                            <option value="MP">Manajemen Perkantoran</option>
                            <option value="BD">Bisnis Digital</option>
                            <option value="DKV">Desain Komunikasi Visual</option>
                            <option value="RPL">Rekayasa Perangkat Lunak</option>
                        </select>
                    </td>
                    <tr>
                    <tr>
                        <td><button type="submit" name="simpan" value="simpan">Simpan</button></td>
                        <td><button type="reset" name="simpan" >Reset</button></td>
                    </tr>
                </tr>
                </tr>
            </table>
        </form>
    </body>
</html>