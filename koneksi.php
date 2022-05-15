<?php

class koneksi
{
    public function get_koneksi()
    {
        // $conn = mysqli_connect("139.162.54.225", "irsyad", "Kata5and10!", "lsp27_db");
        $conn = mysqli_connect("localhost", "root", "", "lsp27_db");
        if (mysqli_connect_errno()) {
            echo "koneksi database gagal";
        }
        return $conn;
    }
}

$konek = new koneksi();
$koneksi = $konek->get_koneksi();
