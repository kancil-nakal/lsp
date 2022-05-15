<?php
include '../koneksi.php';
$kd_dosen = $_GET['kd_dosen'];

$query = "select * from tbl_dosen where kd_dosen= '$kd_dosen';";
$data = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelatihan Gelombang 27 | Update Dosen</title>
</head>

<body>
    <h1>Update Data Dosen</h1>
    <a href="dosen_data.php"> &lt; &lt; Back</a>
    <br>
    <form action="" method="post">
        <table>
            <?php while ($d = mysqli_fetch_assoc($data)) : ?>
                <tr>
                    <td><label for="kd_dosen">Kode</label></td>
                    <td><input type="text" name="kd_dosen" id="kd_dosen" value="<?= $d['kd_dosen']; ?>" readonly></td>
                </tr>
                <tr>
                    <td><label for="nama">Nama Dosen</label></td>
                    <td><input type="text" name="nama" id="nama" value="<?= $d['nama']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat Dosen</label></td>
                    <td><input type="text" name="alamat" id="alamat" value="<?= $d['alamat']; ?>"></td>
                </tr>
                <tr>
                    <td><label for=""></label></td>
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

<?php
if (isset($_POST['submit'])) {
    $kd_dosen = $_POST['kd_dosen'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    mysqli_query($koneksi, "update tbl_dosen set nama='$nama', alamat='$alamat' where kd_dosen=$kd_dosen;");
    header("location:dosen_data.php");
}
?>