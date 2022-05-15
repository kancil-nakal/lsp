<?php
include "../koneksi.php";

$kd_matkul = $_GET['kd_matkul'];

mysqli_query($koneksi, "delete from tbl_matkul where kd_matkul=$kd_matkul");
if (mysqli_affected_rows($koneksi) > 0) {
    header("location:matkul_data.php");
} else {
    echo mysqli_error($koneksi);
}
