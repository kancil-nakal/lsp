<?php
session_start();
if ($_SESSION['login'] == false) {
    header("Location:../login.php");
}
include '../koneksi.php';

if (isset($_POST['submit'])) {
    // var_dump($_POST);
    // die;
    $kd_matkul = $_POST['kd_matkul'];
    $nama = $_POST['nama'];
    $sks = $_POST['sks'];
    mysqli_query($koneksi, "insert into tbl_matkul values('$kd_matkul','$nama','$sks');");
    if (mysqli_affected_rows($koneksi) > 0) {
        header("location:matkul_data.php");
    } else {
        echo mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelatihan Gelombang 27 | Tambah Mata Kuliah</title>
</head>

<body>
    <h1>Tambah Mata Kuliah</h1>
    <a href="matkul_data.php"> &lt; &lt; Back</a>
    <br>
    <form action="#" method="post">
        <table>
            <tr>
                <td>
                    <label for="kd_matkul">Kode</label>
                </td>
                <td>
                    <input type="text" name="kd_matkul" id="matkul">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nama">Nama</label>
                </td>
                <td>
                    <input type="text" name="nama" id="nama">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="sks">SKS</label>
                </td>
                <td>
                    <input type="text" name="sks" id="sks">
                </td>
            </tr>
            <tr>
                <td>
                    <label for=""></label>
                </td>
                <td>
                    <button type="submit" name="submit">SIMPAN</button>
                    <button type="reset">UNDO</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>