<?php
include '../koneksi.php';
$nim = $_GET['nim'];
$data = mysqli_query($koneksi, "select * from tbl_mahasiswa where nim=$nim");


if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    mysqli_query($koneksi, "update tbl_mahasiswa set nama='$nama',jurusan='$jurusan', alamat='$alamat' where nim=$nim;");
    header("location:mahasiswa_data.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelatihan Gelombang 27 | Update Mahasiswa</title>
</head>

<body>
    <h1>Update Data Mahasiswa</h1>
    <a href="mahasiswa_data.php"> &lt; &lt; Back</a>
    <br>
    <form action="" method="post">
        <table>
            <?php while ($d = mysqli_fetch_assoc($data)) : ?>
                <tr>
                    <td>
                        <label for="nim">NIM</label>
                    </td>
                    <td>
                        <input type="text" name="nim" value="<?= $d['nim']; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nama">Nama Mahasiswa</label>
                    </td>
                    <td>
                        <input type="text" name="nama" value="<?= $d['nama']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="jurusan">Jurusan</label>
                    </td>
                    <td>
                        <input type="text" name="jurusan" value="<?= $d['jurusan']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="alamat">Alamat </label>
                    </td>
                    <td>
                        <textarea type="text" name="alamat"><?= $d['alamat']; ?></textarea>
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