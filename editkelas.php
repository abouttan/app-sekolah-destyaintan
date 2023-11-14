<?php
    require_once('config.php');
    if(isset($_POST['update'])){
        extract($_POST);
        $update = mysqli_query($conn,"update tbkelas set nama_kelas='$nama_kelas', jurusan='$jurusan' where idkelas='$id'");
        var_dump($update);
        if($update){
            ?>
            <script>
                alert('simpan berhasil');
                location.href='?hal=tampilkelas';
            </script>
            <?php
        }else{
            echo "<script>alert('update GAGAL')</script>";
            header("location:?hal=tampilkelas");
        }
    }

    $id = isset($_GET['id'])?$_GET['id']:"";
    if($id == ""){
        echo "<script>alert('data tidak ditemukan');location.href='?hal=tampilkelas';</script>";
    }else{
        $query = mysqli_query($conn,"select * from tbkelas where idkelas=$id");
        $baris = mysqli_fetch_array($query);
    }
?>
<html>
    <head>
        <title>Edit Data</title>
    </head>
    <body>
        <a href="?hal=tampilkelas">Kembali ke home</a>
        <br>
        <br>
        <form action="?hal=editkelas" method="post">
            <table>
                <input type="hidden" name="id" value="<?=$baris['idkelas']?>">
                <tr>
                    <td>NAMAKELAS</td>
                    <td><input type="text" name="nama_kelas" placeholder="Nama Kelas" maxlength="10" value="<?=$baris['nama_kelas']?>"></td>
                </tr>
                <tr>
                    <td>JURUSAN</td>
                    <td>
                        <select name="jurusan">
                            <option <?=$baris['jurusan']=='AK'?'selected':''?> value="AK">Akuntansi</option>
                            <option <?=$baris['jurusan']=='MP'?'selected':''?> value="MP">Manajemen Perkantoran</option>
                            <option <?=$baris['jurusan']=='BD'?'selected':''?> value="BD">Bisnis Digital</option>
                            <option <?=$baris['jurusan']=='DKV'?'selected':''?> value="DKV">Desain Komunikasi Visual</option>
                            <option <?=$baris['jurusan']=='RPL'?'selected':''?> value="RPL">Rekayasa Perangkat Lunak</option>
                        </select>
                    </td>
                    <tr>
                    <tr>
                        <td><button type="submit" name="update">Update</button></td>
                        <td><button type="reset" name="reset">Reset</button></td>
                    </tr>
                </tr>
                </tr>
            </table>
        </form>
    </body>
</html>