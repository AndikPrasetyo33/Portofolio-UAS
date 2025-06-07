<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM portofolio WHERE id=$id"));
?>

<!DOCTYPE html>
<html>
<head><title>Edit</title></head>
<body>
    <h2>Edit Kegiatan</h2>
    <form method="POST" enctype="multipart/form-data">
        Nama Kegiatan: <input type="text" name="nama_kegiatan" value="<?= $data['nama_kegiatan'] ?>"><br><br>
        Waktu Kegiatan: <input type="text" name="waktu_kegiatan" value="<?= $data['waktu_kegiatan'] ?>"><br><br>
        Ganti Bukti (kosongkan jika tidak diubah): <input type="file" name="bukti"><br><br>
        <button type="submit" name="submit">Update</button>
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama_kegiatan'];
    $waktu = $_POST['waktu_kegiatan'];
    
    if ($_FILES['bukti']['name'] != '') {
        $bukti = $_FILES['bukti']['name'];
        $tmp = $_FILES['bukti']['tmp_name'];
        move_uploaded_file($tmp, "gambar/".$bukti);
        mysqli_query($koneksi, "UPDATE portofolio SET nama_kegiatan='$nama', waktu_kegiatan='$waktu', bukti='$bukti' WHERE id=$id");
    } else {
        mysqli_query($koneksi, "UPDATE portofolio SET nama_kegiatan='$nama', waktu_kegiatan='$waktu' WHERE id=$id");
    }

    header("Location: index.php");
}
?>
