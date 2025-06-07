
<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andik Prasetyo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="menu">
            <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Tentang Saya</a></li>
                <li><a href="#">Portofolio</a></li>
                <li><a href="#">Lainnya</a>
                    <ul class="dropdown">
                        <li><a href="https://www.instagram.com/andik.coyz?igsh=bnBwZ2NjeG9hZDI1">Instagram</a></li>
                        <li><a href="https://www.facebook.com/share/1ARSZzaAA7/">Facebook</a></li>
                        <li><a href="https://www.tiktok.com/@gludak01?_t=ZS-8vkI4E1Bowx&_r=1">Tiktok</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <img src="foto/WhatsApp Image 2025-04-23 at 20.20.22.jpeg">
        <h3>Hallo, Perkenalkan nama saya Andik Prasetyo.<br>Saya adalah Roamer masa depan RRQ</h3>
    </main>
    <section class="bio">
        <h1>Tentang Saya</h1>
        <div>
            <p>saya adalah seorang mahasiswa Teknik Informatika di UNUGIRI BOJONEGORO. Saya lulusan SMK Sunan Drajat Lamongan Angkatan 2024</p>
            <img src="foto/WhatsApp Image 2025-04-21 at 15.55.15.jpeg">
        </div>
    </section>
    <section class="pri">
        <h1>Portofolio</h1>
        <a href="tambah.php" class="btn tambah">Tambah Kegiatan</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Waktu Kegiatan</th>
                    <th>Bukti Kegiatan</th>
                </tr>
            </thead>
            <tbody>
               <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM portofolio");
                while ($data = mysqli_fetch_array($query)) {
                     $ext = strtolower(pathinfo($data['bukti'], PATHINFO_EXTENSION));
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama_kegiatan'] ?></td>
                    <td><?= $data['waktu_kegiatan'] ?></td>
                    <td>
                        <?php if (in_array($ext, ['jpg', 'jpeg', 'png'])): ?>
                        <img src="foto/<?= $data['bukti'] ?>" width="100">
                        <?php elseif ($ext == 'pdf'): ?>
                        <a href="sertifikat/<?= $data['bukti'] ?>" target="_blank">Lihat Sertifikat</a>
                        <?php else: ?>
                        File tidak dikenali
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?= $data['id'] ?>" class="btn edit">Edit</a> |
                        <a href="hapus.php?id=<?= $data['id'] ?>" class="btn hapus" onclick="return confirm('Hapus data?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
    <section class="msn">
        <h1>OPINI</h1>
        <div class="berita">
            <a href="pages/barcelona.html" target="_blank" class="card">
                <img src="foto/images (1).jpg" alt="Barcelona">
                <p>Kenapa harus BARCELONA FC ?</p>
              </a>
              <a href="pages/messi.html" target="_blank" class="card">
                  <img src="foto/images.jpg" alt="Messi">
                  <p>G.O.A.T</p>
                </a>
                <a href="pages/msn.html" target="_blank" class="card">
                  <img src="foto/images (2).jpg" alt="MSN">
                  <p>Trio MSN</p>
                </a>
                <a href="pages/madrit.html" target="_blank" class="card">
                  <img src="foto/download (1).jpg" alt="madrit">
                  <p>Sang Raja Eropa</p>
                </a>
                <a href="pages/cr7.html" target="_blank" class="card">
                  <img src="foto/images (4).jpg" alt="ronaldo">
                  <p>Ikon Sepak Bola Dunia</p>
                </a>
                <a href="pages/bbc.html" target="_blank" class="card">
                  <img src="foto/a1116149-af6e-4bfd-96d3-4072901d88c6_169.jpg" alt="bbc">
                  <p>Trio BBC</p>
                </a>
        </div>
      </section>
      <section class="kontak-container">
        <!-- Form Kontak -->
        <form class="form-kontak">
          <h2>Hubungi Kami</h2>
          <label for="nama">Nama:</label>
          <input type="text" id="nama" name="nama" required>
    
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
    
          <label for="subject">Subjek:</label>
          <input type="text" id="subject" name="subject" required>
    
          <label for="pesan">Isi Pesan:</label>
          <textarea id="pesan" name="pesan" rows="5" required></textarea>
    
          <button type="submit">Kirim</button>
        </form>
    
        <!-- Lokasi -->
        <div class="lokasi">
          <h2>Lokasi Kami</h2>
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d247.45281910266326!2d111.9613703013656!3d-7.097564369742009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1745426664298!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </section>
    <footer>
        <p>&copy;Andik Prasetyo</p>
    </footer>
</body>
</html>