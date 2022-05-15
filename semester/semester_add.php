<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {
    // var_dump($_POST);
    // die;
    $kd_semester = $_POST['kd_semester'];
    $semester = $_POST['semester'];
    mysqli_query($koneksi, "insert into tbl_semester values('$kd_semester','$semester');");
    if (mysqli_affected_rows($koneksi) > 0) {
        header("location:semester_data.php");
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
    <title>Pelatihan Gelombang 27 | Tambah Semester</title>
</head>

<body>
    <h1>Tambah Semester</h1>
    <a href="semester_data.php"> &lt; &lt; Back</a>
    <br>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <label for="kd_semester">Kode</label>
                </td>
                <td>
                    <input type="text" name="kd_semester">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="semester">Semester</label>
                </td>
                <td>
                    <input type="text" name="semester">
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
        <!-- <label for="">Kode</label>
        <input type="text"><br>
        <label for="">Nama Dosen</label>
        <input type="text"><br>
        <label for="">Alamat Dosen</label>
        <input type="text"><br> -->
        <!-- <button type="submit">SIMPAN</button> -->
    </form>
</body>

</html>