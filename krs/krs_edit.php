<?php
session_start();
if ($_SESSION['login'] == false) {
    header("Location:../login.php");
}
include '../koneksi.php';

$id_krs = $_GET['id'];
$krs = mysqli_query($koneksi, "select *,tm.nama as nama_mahasiswa,td.nama as nama_dosen,tm2.nama as matakuliah,tk.id as id_krs FROM tbl_krs tk, tbl_jadwal tj ,tbl_mahasiswa tm ,tbl_semester ts ,tbl_dosen td ,tbl_matkul tm2 WHERE tj.kd_dosen =td.kd_dosen and tj.kd_matkul =tm2.kd_matkul and tk.id_jadwal =tj.id and tk.nim =tm.nim and tk.kd_semester =ts.kd_semester and tk.id=$id_krs;");
$jadwal = mysqli_query($koneksi, "select *,td.nama as nama_dosen,tm.nama as matakuliah from tbl_jadwal tj inner join tbl_dosen td on tj.kd_dosen =td.kd_dosen INNER JOIN tbl_matkul tm on tj.kd_matkul =tm.kd_matkul ;");
$mahasiswa = mysqli_query($koneksi, "select * from tbl_mahasiswa;");
$semester = mysqli_query($koneksi, "select * from tbl_semester;");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $id_jadwal = $_POST['id_jadwal'];
    $nim = $_POST['nim'];
    $kd_semester = $_POST['kd_semester'];
    mysqli_query($koneksi, "update tbl_krs set id_jadwal='$id_jadwal', nim='$nim', kd_semester='$kd_semester' where id=$id;");
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
    <title>Pelatihan Gelombang 27 | Update KRS</title>
</head>

<body>
    <h1>Update KRS</h1>
    <a href="krs_data.php"> &lt; &lt; Back</a>
    <br>
    <form action="" method="post">
        <table>
            <?php while ($k = mysqli_fetch_array($krs)) : ?>
                <input type="hidden" name="id" id="id" value="<?= $k['id']; ?>">
                <tr>
                    <td>
                        <label for="id_jadwal">Jadwal</label>
                    </td>
                    <td>
                        <select name="id_jadwal" id="id_jadwal" style="width: 400px;">
                            <?php while ($j = mysqli_fetch_array($jadwal)) : ?>
                                <option value=" <?= $j['id']; ?>" <?= $k['id'] == $j['id'] ? 'selected' : ''; ?>><?= $j['ruang'] . ' | ' . $j['waktu'] . ' | ' . $j['nama_dosen'] . ' | ' . $j['matakuliah']; ?></option>
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
                            <?php while ($m = mysqli_fetch_assoc($mahasiswa)) : ?>
                                <option value="<?= $m['nim']; ?>" <?= $k['nim'] == $m['nim'] ? 'selected' : ''; ?>><?= $m["nama"]; ?></option>
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
                            <?php while ($s = mysqli_fetch_assoc($semester)) : ?>
                                <option value="<?= $s['kd_semester']; ?>" <?= $k['kd_semester'] == $s['kd_semester'] ? 'selected' : ' '; ?>><?= $s['semester'] ?></option>
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
            <?php endwhile ?>
        </table>
    </form>
</body>

</html>