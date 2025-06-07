<?php
$koneksi = new mysqli("localhost", "root", "", "web_andik");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
