<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Tambah Kegiatan</title></head>
<body>
    <h2>Tambah Kegiatan</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        Nama Kegiatan: <input type="text" name="nama_kegiatan" required><br><br>
        Waktu Kegiatan: <input type="text" name="waktu_kegiatan" required><br><br>
        Bukti Kegiatan (gambar/pdf): <input type="file" name="bukti" required><br><br>
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_kegiatan']);
    $waktu = mysqli_real_escape_string($koneksi, $_POST['waktu_kegiatan']);
    $bukti = $_FILES['bukti']['name'];
    $tmp = $_FILES['bukti']['tmp_name'];
    $error = $_FILES['bukti']['error'];
    $ext = strtolower(pathinfo($bukti, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'pdf'];

    if (in_array($ext, $allowed)) {
        if ($error === 0) {
            $uniqueName = time() . '_' . $bukti;

            $tujuan = in_array($ext, ['jpg', 'jpeg', 'png']) ? "foto/" : "sertifikat/";
            move_uploaded_file($tmp, $tujuan . $uniqueName);

            mysqli_query($koneksi, "INSERT INTO portofolio VALUES('', '$nama', '$waktu', '$uniqueName')");
            header("Location: index.php");
        } else {
            echo "Terjadi kesalahan saat upload file.";
        }
    } else {
        echo "Ekstensi file tidak diizinkan.";
    }
}
?>
