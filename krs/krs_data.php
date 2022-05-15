<?php
include '../koneksi.php';
$query = "select *,tm.nama as nama_mahasiswa,td.nama as nama_dosen,tm2.nama as matakuliah,tk.id as id_krs FROM tbl_krs tk, tbl_jadwal tj ,tbl_mahasiswa tm ,tbl_semester ts ,tbl_dosen td ,tbl_matkul tm2 WHERE tj.kd_dosen =td.kd_dosen and tj.kd_matkul =tm2.kd_matkul and tk.id_jadwal =tj.id and tk.nim =tm.nim and tk.kd_semester =ts.kd_semester ;";
$data = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelatihan Gelombang 27 | KRS</title>
</head>

<body>
    <h1>KRS</h1>
    <a href="krs_add.php"><button>+ TAMBAH KRS</button></a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Mahasiswa</th>
            <th>Kode Matkul</th>
            <th>Matakuliah</th>
            <th>Kode Dosen</th>
            <th>Dosen</th>
            <th>Ruang</th>
            <th>Waktu</th>
            <th>Semester</th>
            <th>Opsi</th>
        </tr>
        <?php $no = 1;
        while ($d = mysqli_fetch_assoc($data)) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['nim']; ?></td>
                <td><?= $d['nama_mahasiswa']; ?></td>
                <td><?= $d['kd_matkul']; ?></td>
                <td><?= $d['matakuliah']; ?></td>
                <td><?= $d['kd_dosen']; ?></td>
                <td><?= $d['nama_dosen']; ?></td>
                <td><?= $d['ruang']; ?></td>
                <td><?= $d['waktu']; ?></td>
                <td><?= $d['semester']; ?></td>
                <td>
                    <a href="krs_edit.php?id=<?= $d['id_krs']; ?>">edit</a>
                    <a href="krs_delete.php?id=<?= $d['id_krs']; ?>" onclick="return confirm('Apakah anda yakin?')">delete</a>
                </td>
            </tr>
        <?php endwhile ?>
    </table>
    <br><br>
    <a href="../index.php">Back to Main Menu</a><br>
    <a href="">Logout</a>
</body>

</html>