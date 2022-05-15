<?php
include '../koneksi.php';
$data = mysqli_query($koneksi, "select * from tbl_mahasiswa;")

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelatihan Gelombang 27 | Mahasiswa</title>
</head>

<body>
    <h1>Data Mahasiswa</h1>
    <a href="mahasiswa_add.php"><button>+ TAMBAH MAHASISWA</button></a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Opsi</th>
        </tr>
        <?php $no = 1;
        while ($d = mysqli_fetch_assoc($data)) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['nim'] ?></td>
                <td><?= $d['nama'] ?></td>
                <td><?= $d['jurusan'] ?></td>
                <td><?= $d['alamat'] ?></td>
                <td>
                    <a href="mahasiswa_edit.php?nim=<?= $d['nim']; ?>">edit</a>
                    <a href="mahasiswa_delete.php?nim=<?= $d['nim']; ?>" onclick="return confirm('Apakah anda yakin?')">delete</a>
                </td>
            </tr>
        <?php endwhile ?>
    </table>
    <br><br>
    <a href="../index.php">Back to Main Menu</a><br>
    <a href="">Logout</a>
</body>

</html>