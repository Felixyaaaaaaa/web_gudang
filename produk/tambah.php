<?php
include '../koneksi.php';
include '../template/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama = $_POST['nama'];
  $kategori = $_POST['kategori'];
  $deskripsi = $_POST['deskripsi'];

  mysqli_query($conn, "INSERT INTO produk (nama_produk, kategori, deskripsi) VALUES ('$nama', '$kategori', '$deskripsi')");
  header("Location: index.php");
}
?>

<h3>Tambah Produk</h3>
<form method="POST">
  <div class="mb-3">
    <label>Nama Produk</label>
    <input type="text" name="nama" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Kategori</label>
    <input type="text" name="kategori" class="form-control">
  </div>
  <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Simpan</button>
  <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<?php include '../template/footer.php'; ?>
