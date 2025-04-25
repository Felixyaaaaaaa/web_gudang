<?php
include '../koneksi.php';
include '../template/header.php';

$barangMasuk = mysqli_query($conn, "SELECT bm.*, p.nama_produk, l.kode_lokasi, l.deskripsi 
                                    FROM barang_masuk bm 
                                    JOIN produk p ON bm.id_produk = p.id_produk
                                    JOIN lokasi l ON bm.id_lokasi = l.id_lokasi");


?>

<h3>Daftar Barang Masuk</h3>
<a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Barang Masuk</a>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Produk</th>
      <th>Jumlah</th>
      <th>Tanggal</th>
      <th>Lokasi Penyimpanan</th>
      <th>Keterangan</th> <!-- Kolom Keterangan ditambahkan -->
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; while ($row = mysqli_fetch_assoc($barangMasuk)) : ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $row['nama_produk'] ?></td>
      <td><?= $row['jumlah'] ?></td>
      <td><?= $row['tanggal'] ?></td>
      <td><?= $row['kode_lokasi'] ?> - <?= $row['deskripsi'] ?></td>
      <td><?= $row['keterangan'] ?></td> <!-- Menampilkan Keterangan -->
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<?php include '../template/footer.php'; ?>
