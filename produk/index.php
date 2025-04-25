<?php
include '../koneksi.php';
include '../template/header.php';

$produk = mysqli_query($conn, "SELECT * FROM produk");
?>

<h3>Manajemen Produk</h3>
<a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Produk</a>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Produk</th>
      <th>Kategori</th>
      <th>Deskripsi</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; while ($row = mysqli_fetch_assoc($produk)) : ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $row['nama_produk'] ?></td>
      <td><?= $row['kategori'] ?></td>
      <td><?= $row['deskripsi'] ?></td>
      <td>
        <a href="edit.php?id=<?= $row['id_produk'] ?>" class="btn btn-sm btn-warning">Edit</a>
        <a href="hapus.php?id=<?= $row['id_produk'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<?php include '../template/footer.php'; ?>
