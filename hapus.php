<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM portofolio WHERE id=$id");
header("Location: index.php");
?>
