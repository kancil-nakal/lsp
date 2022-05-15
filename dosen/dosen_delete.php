<?php
include "../koneksi.php";

$kd_dosen = $_GET['kd_dosen'];

mysqli_query($koneksi, "delete from tbl_dosen where kd_dosen='$kd_dosen'");
header("location:dosen_data.php");
