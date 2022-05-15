<?php
session_start();
if ($_SESSION['login'] == false) {
    header("Location:../login.php");
}
include '../koneksi.php';
$query = "select * from tbl_matkul;";

$data = mysqli_query($koneksi, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelatihan Gelombang 27 | Mata Kuliah</title>
</head>

<body>
    <h1>Mata kuliah</h1>
    <a href="matkul_add.php"><button>+ TAMBAH MATKUL</button></a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>SKS</th>
            <th>Opsi</th>
        </tr>
        <?php $no = 1;
        foreach ($data as $d) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['kd_matkul']; ?></td>
                <td><?= $d['nama']; ?></td>
                <td><?= $d['sks']; ?></td>
                <td>
                    <a href="matkul_edit.php?kd_matkul=<?= $d['kd_matkul']; ?>">edit</a>
                    <a href="matkul_delete.php?kd_matkul=<?= $d['kd_matkul']; ?>" onclick="return confirm('apakah anda yakin?')">delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <br><br>
    <a href="../index.php">Back to Main Menu</a><br>
    <a href="">Logout</a>
</body>

</html>