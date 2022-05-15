<?php
include '../koneksi.php';
session_start();
if ($_SESSION['login'] == false) {
    header("Location:../login.php");
}

if (isset($_POST['submit'])) {
    $kd_dosen = $_POST['kd_dosen'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    mysqli_query($koneksi, "insert into tbl_dosen values('$kd_dosen','$nama','$alamat');");
    header("location:dosen_data.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelatihan Gelombang 27 | Tambah Dosen</title>
</head>

<body>
    <h1>Tambah Data Dosen</h1>
    <a href="dosen_data.php"> &lt; &lt; Back</a>
    <br>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="kd_dosen">Kode</label> </td>
                <td><input type="text" name="kd_dosen"></td>
            </tr>
            <tr>
                <td><label for="nama">Nama Dosen</label></td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat Dosen</label></td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="submit">SIMPAN</button>
                    <button type="reset">UNDO</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>

<?php

?>