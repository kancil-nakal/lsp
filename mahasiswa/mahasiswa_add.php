<?php
session_start();
if ($_SESSION['login'] == false) {
    header("Location:../login.php");
}
include '../koneksi.php';
if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    mysqli_query($koneksi, "insert into tbl_mahasiswa values('$nim','$nama','$jurusan', '$alamat');");
    if (mysqli_affected_rows($koneksi) > 0) {
        header("location:mahasiswa_data.php");
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
    <title>Pelatihan Gelombang 27 | Tambah Mahasiswa</title>
</head>

<body>
    <h1>Tambah Data Mahasiswa</h1>
    <a href="mahasiswa_data.php"> &lt; &lt; Back</a>
    <br>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <label for="nim">NIM</label>
                </td>
                <td>
                    <input type="text" name="nim">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nama">Nama Mahasiswa</label>
                </td>
                <td>
                    <input type="text" name="nama">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="jurusan">Jurusan</label>
                </td>
                <td>
                    <input type="text" name="jurusan">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="alamat">Alamat </label>
                </td>
                <td>
                    <input type="text" name="alamat">
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