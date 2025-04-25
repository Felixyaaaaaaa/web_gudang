<?php
// Pastikan koneksi ke database di-include
include '../koneksi.php';

// Query untuk mengambil data stok produk beserta lokasi penyimpanan
$data = mysqli_query($conn, "
  SELECT p.nama_produk, SUM(s.jumlah) AS stok_tersedia, l.kode_lokasi 
  FROM stok s 
  JOIN produk p ON s.id_produk = p.id_produk 
  JOIN lokasi l ON s.id_lokasi = l.id_lokasi 
  GROUP BY p.id_produk, l.id_lokasi
");
?>

<h3>Laporan Stok Produk</h3>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Nama Produk</th>
      <th>Stok Tersedia</th>
      <th>Lokasi Penyimpanan</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($data)) : ?>
      <tr>
        <td><?= $row['nama_produk'] ?></td>
        <td><?= $row['stok_tersedia'] ?></td>
        <td><?= $row['kode_lokasi'] ?></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>
