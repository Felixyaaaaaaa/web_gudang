<?php
include '../koneksi.php';
include '../template/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $kode_lokasi = $_POST['kode_lokasi'];
  $deskripsi = $_POST['deskripsi'];

  mysqli_query($conn, "INSERT INTO lokasi (kode_lokasi, deskripsi) VALUES ('$kode_lokasi', '$deskripsi')");
  header("Location: index.php");
}
?>

<h3>Tambah Lokasi Penyimpanan</h3>
<form method="POST">
  <div class="mb-3">
    <label>Kode Lokasi</label>
    <input type="text" name="kode_lokasi" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Simpan</button>
  <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<?php include '../template/footer.php'; ?>
