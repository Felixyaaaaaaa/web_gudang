<?php
include '../koneksi.php';
include '../template/header.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM lokasi WHERE id_lokasi = $id"));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $kode_lokasi = $_POST['kode_lokasi'];
  $deskripsi = $_POST['deskripsi'];

  mysqli_query($conn, "UPDATE lokasi SET kode_lokasi='$kode_lokasi', deskripsi='$deskripsi' WHERE id_lokasi = $id");
  header("Location: index.php");
}
?>

<h3>Edit Lokasi Penyimpanan</h3>
<form method="POST">
  <div class="mb-3">
    <label>Kode Lokasi</label>
    <input type="text" name="kode_lokasi" class="form-control" value="<?= $data['kode_lokasi'] ?>" required>
  </div>
  <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control"><?= $data['deskripsi'] ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
  <a href="index.php" class="btn btn-secondary">Batal</a>
</form>

<?php include '../template/footer.php'; ?>
