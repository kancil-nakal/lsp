<?php
include '../koneksi.php';
$query = "select *, td.nama as nama_dosen, tm.nama as matakuliah from tbl_jadwal tj, tbl_dosen td , tbl_matkul tm WHERE tj.kd_dosen =
td.kd_dosen and tj.kd_matkul =tm.kd_matkul ;";

$data = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelatihan Gelombang 27 | Jadwal Mengajar</title>
</head>

<body>
    <h1>Jadwal Mengajar</h1>
    <a href="jadwal_add.php"><button>+ TAMBAH JADWAL</button></a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Kode Dosen</th>
            <th>Nama Dosen</th>
            <th>Kode Matkul</th>
            <th>Nama Matkul</th>
            <th>Ruang</th>
            <th>Waktu</th>
            <th>Opsi</th>
        </tr>
        <?php $no = 1;
        foreach ($data as $d) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['kd_dosen']; ?></td>
                <td><?= $d['nama_dosen']; ?></td>
                <td><?= $d['kd_matkul']; ?></td>
                <td><?= $d['matakuliah']; ?></td>
                <td><?= $d['ruang']; ?></td>
                <td><?= $d['waktu']; ?></td>
                <td>
                    <a href="matkul_edit.php?kd_matkul=" <?= $d['kd_matkul']; ?>>edit</a>
                    <a href="matkul_delete.php?kd_matkul=" <?= $d['kd_matkul']; ?>>delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <br><br>
    <a href="../index.php">Back to Main Menu</a><br>
    <a href="">Logout</a>
</body>

</html>