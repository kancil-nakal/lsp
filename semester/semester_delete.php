<?php
include "../koneksi.php";

$kd_semester = $_GET['kd_semester'];

mysqli_query($koneksi, "delete from tbl_semester where kd_semester='$kd_semester'");
header("location:semester_data.php");
