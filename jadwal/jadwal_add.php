<?php
include '../koneksi.php';

$dosen = mysqli_query($koneksi, "select * from tbl_dosen;");
$matkul = mysqli_query($koneksi, "select * from tbl_matkul;");

if (isset($_POST['submit'])) {
    // var_dump($_POST);
    // die;
    $kd_dosen = $_POST['kd_dosen'];
    $kd_matkul = $_POST['kd_matkul'];
    $ruang = $_POST['ruang'];
    $waktu = $_POST['waktu'];
    mysqli_query($koneksi, "insert into tbl_jadwal(kd_dosen,kd_matkul,ruang,waktu) values('$kd_dosen','$kd_matkul','$ruang','$waktu');");
    if (mysqli_affected_rows($koneksi) > 0) {
        header("location:jadwal_data.php");
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
    <title>Pelatihan Gelombang 27 | Tambah Jadwal</title>
</head>

<body>
    <h1>Tambah Jadwal</h1>
    <a href="jadwal_data.php"> &lt; &lt; Back</a>
    <br>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <label for="kd_dosen">Dosen</label>
                </td>
                <td>
                    <select name="kd_dosen" id="kd_dosen" style="width: 250px;">
                        <option value="">--Pilih--</option>
                        <?php while ($d = mysqli_fetch_assoc($dosen)) : ?>
                            <option value="<?= $d['kd_dosen']; ?>"><?= $d['kd_dosen'] . ' - ' . $d['nama']; ?></option>
                        <?php endwhile ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="kd_matkul">Matkul</label>
                </td>
                <td>
                    <select name="kd_matkul" id="kd_matkul" style="width: 250px;">
                        <option value="">--Pilih--</option>
                        <?php while ($m = mysqli_fetch_assoc($matkul)) : ?>
                            <option value="<?= $m['kd_matkul']; ?>"><?= $m['kd_matkul'] . ' - ' . $m['nama']; ?></option>
                        <?php endwhile ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="ruang">Ruang</label>
                </td>
                <td>
                    <input type="text" style="width: 240px;" name="ruang">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="waktu">Waktu</label>
                </td>
                <td>
                    <input type="text" name="waktu">
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