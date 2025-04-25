<?php
include '../koneksi.php';
include '../template/header.php';

$lokasi = mysqli_query($conn, "SELECT * FROM lokasi");
?>

<h3>Manajemen Lokasi Penyimpanan</h3>
<a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Lokasi</a>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Kode Lokasi</th>
      <th>Deskripsi</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; while ($row = mysqli_fetch_assoc($lokasi)) : ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $row['kode_lokasi'] ?></td>
      <td><?= $row['deskripsi'] ?></td>
      <td>
        <a href="edit.php?id=<?= $row['id_lokasi'] ?>" class="btn btn-sm btn-warning">Edit</a>
        <a href="hapus.php?id=<?= $row['id_lokasi'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<?php include '../template/footer.php'; ?>
