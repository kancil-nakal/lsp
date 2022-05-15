<?php
session_start();
if ($_SESSION['login'] == false) {
    header("Location:../login.php");
}
include "../koneksi.php";

$nim = $_GET['nim'];

mysqli_query($koneksi, "delete from tbl_mahasiswa where nim='$nim'");
header("location:mahasiswa_data.php");
