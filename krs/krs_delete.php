<?php
include "../koneksi.php";

$id_krs = $_GET['id_krs'];

mysqli_query($koneksi, "delete from tbl_krs where id='$id_krs'");
header("location:krs_data.php");
