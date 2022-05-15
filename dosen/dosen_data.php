<?php
include '../koneksi.php';
$query = "select * from tbl_dosen;";
$data = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelatihan Gelombang 27 | Dosen</title>
</head>

<body>
    <h1>Data Dosen</h1>
    <a href="dosen_add.php"><button>+ TAMBAH DOSEN</button></a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($d = mysqli_fetch_assoc($data)) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['kd_dosen']; ?></td>
                    <td><?= $d['nama']; ?></td>
                    <td><?= $d['alamat']; ?></td>
                    <td>
                        <a href="dosen_edit.php?kd_dosen=<?= $d['kd_dosen']; ?>">edit</a>
                        <a href="dosen_delete.php?kd_dosen=<?= $d['kd_dosen']; ?>" onclick="return confirm('Apakah anda yakin?')">delete</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
    <br><br>
    <a href="../index.php">Back to Main Menu</a><br>
    <a href="">Logout</a>
</body>

</html>