<?php
include '../koneksi.php';
$kd_semester = $_GET['kd_semester'];
$data = mysqli_query($koneksi, "select * from tbl_semester where kd_semester=$kd_semester");

if (isset($_POST['submit'])) {
    // var_dump($_POST);
    // die;
    $kd_semester = $_POST['kd_semester'];
    $semester = $_POST['semester'];
    mysqli_query($koneksi, "update tbl_semester set semester='$semester' where kd_semester=$kd_semester;");
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
    <title>Pelatihan Gelombang 27 | Update Semester</title>
</head>

<body>
    <h1>Update Semester</h1>
    <a href="semester_data.php"> &lt; &lt; Back</a>
    <br>
    <form action="" method="post">
        <table>
            <?php while ($d = mysqli_fetch_assoc($data)) : ?>
                <tr>
                    <td>
                        <label for="kd_semester">Kode</label>
                    </td>
                    <td>
                        <input type="text" name="kd_semester" value="<?= $d['kd_semester']; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="semester">Semester</label>
                    </td>
                    <td>
                        <input type="text" name="semester" value="<?= $d['semester']; ?>">
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
            <?php endwhile; ?>
        </table>
    </form>
</body>

</html>