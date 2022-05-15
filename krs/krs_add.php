<?php
session_start();
if ($_SESSION['login'] == false) {
    header("Location:../login.php");
}
include '../koneksi.php';

$jadwal = mysqli_query($koneksi, "select *,td.nama as nama_dosen,tm.nama as matakuliah from tbl_jadwal tj inner join tbl_dosen td on tj.kd_dosen =td.kd_dosen INNER JOIN tbl_matkul tm on tj.kd_matkul =tm.kd_matkul ;");
$mahasiswa = mysqli_query($koneksi, "select * from tbl_mahasiswa;");
$semester = mysqli_query($koneksi, "select * from tbl_semester;");

if (isset($_POST['submit'])) {
    $id_jadwal = $_POST['id_jadwal'];
    $nim = $_POST['nim'];
    $kd_semester = $_POST['kd_semester'];
    mysqli_query($koneksi, "insert into tbl_krs(id_jadwal,nim,kd_semester) values('$id_jadwal','$nim','$kd_semester');");
    if (mysqli_affected_rows($koneksi) > 0) {
        header("location:krs_data.php");
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
    <title>Pelatihan Gelombang 27 | Tambah KRS</title>
</head>

<body>
    <h1>Tambah KRS</h1>
    <a href="krs_data.php"> &lt; &lt; Back</a>
    <br>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <label for="id_jadwal">Jadwal</label>
                </td>
                <td>
                    <select name="id_jadwal" id="id_jadwal" style="width: 400px;">
                        <option value="">--Pilih--</option>
                        <?php while ($j = mysqli_fetch_array($jadwal)) : ?>
                            <option value=" <?= $j['id']; ?>"><?= $j['ruang'] . ' | ' . $j['waktu'] . ' | ' . $j['nama_dosen'] . ' | ' . $j['matakuliah']; ?></option>
                        <?php endwhile ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nim">Mahasiswa</label>
                </td>
                <td>
                    <select name="nim" id="nim" style="width: 400px;">
                        <option value="">--Pilih--</option>
                        <?php while ($m = mysqli_fetch_assoc($mahasiswa)) : ?>
                            <option value="<?= $m['nim']; ?>"><?= $m["nama"]; ?></option>
                        <?php endwhile ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="kd_semester">Semester</label>
                </td>
                <td>
                    <select name="kd_semester" id="kd_semester" style="width: 400px;">
                        <option value="">--Pilih--</option>
                        <?php while ($s = mysqli_fetch_assoc($semester)) : ?>
                            <option value="<?= $s['kd_semester']; ?>"><?= $s['semester'] ?></option>
                        <?php endwhile ?>
                    </select>
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