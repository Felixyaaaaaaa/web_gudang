<?php
include '../koneksi.php';
include '../template/header.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = $id"));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama = $_POST['nama'];
  $kategori = $_POST['kategori'];
  $deskripsi = $_POST['deskripsi'];

  mysqli_query($conn, "UPDATE produk SET nama_produk='$nama', kategori='$kategori', deskripsi='$deskripsi' WHERE id_produk = $id");
  header("Location: index.php");
}
?>

<h3>Edit Produk</h3>
<form method="POST">
  <div class="mb-3">
    <label>Nama Produk</label>
    <input type="text" name="nama" class="form-control" value="<?= $data['nama_produk'] ?>" required>
  </div>
  <div class="mb-3">
    <label>Kategori</label>
    <input type="text" name="kategori" class="form-control" value="<?= $data['kategori'] ?>">
  </div>
  <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control"><?= $data['deskripsi'] ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
  <a href="index.php" class="btn btn-secondary">Batal</a>
</form>

<?php include '../template/footer.php'; ?>
