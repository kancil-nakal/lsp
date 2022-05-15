<?php
session_start();
if ($_SESSION['login'] == false) {
    header("Location:../login.php");
}
include '../koneksi.php';
$query = "select * from tbl_semester ;";

$data = mysqli_query($koneksi, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelatihan Gelombang 27 | Semester</title>
</head>

<body>
    <h1>Semester</h1>
    <a href="semester_add.php"><button>+ TAMBAH SEMESTER</button></a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Semester</th>
            <th>Opsi</th>
        </tr>
        <?php $no = 1;
        while ($d = mysqli_fetch_assoc($data)) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['kd_semester']; ?></td>
                <td><?= $d['semester']; ?></td>
                <td>
                    <a href="semester_edit.php?kd_semester=<?= $d['kd_semester']; ?>">edit</a>
                    <a href="semester_delete.php?kd_semester=<?= $d['kd_semester']; ?>" onclick="return confirm('Apakah anda yakin?')">delete</a>
                </td>
            </tr>
        <?php endwhile ?>
    </table>
    <br><br>
    <a href="../index.php">Back to Main Menu</a><br>
    <a href="">Logout</a>
</body>

</html>