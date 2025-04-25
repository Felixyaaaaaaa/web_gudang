<?php
// Pastikan koneksi ke database di-include
include '../koneksi.php';

// Query untuk mengambil data barang keluar beserta nama produk dan lokasi
$data = mysqli_query($conn, "
  SELECT bk.*, p.nama_produk, l.kode_lokasi 
  FROM barang_keluar bk 
  JOIN produk p ON bk.id_produk = p.id_produk 
  JOIN lokasi l ON bk.id_lokasi = l.id_lokasi 
  ORDER BY bk.tanggal DESC
");
?>

<h3>Laporan Barang Keluar</h3>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Tanggal</th>
      <th>Produk</th>
      <th>Jumlah</th>
      <th>Lokasi Penyimpanan</th>
      <th>Keterangan</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($data)) : ?>
      <tr>
        <td><?= $row['tanggal'] ?></td>
        <td><?= $row['nama_produk'] ?></td>
        <td><?= $row['jumlah'] ?></td>
        <td><?= $row['kode_lokasi'] ?></td>
        <td><?= $row['keterangan'] ?></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>
