<?php 
include 'koneksi.php'; 
include 'template/header.php'; 

// Hitung total produk
$produk = mysqli_query($conn, "SELECT COUNT(*) as total FROM produk");
$data_produk = mysqli_fetch_assoc($produk);

// Hitung total barang masuk hari ini
$today = date('Y-m-d');
$masuk = mysqli_query($conn, "SELECT SUM(jumlah) as total FROM barang_masuk WHERE tanggal = '$today'");
$data_masuk = mysqli_fetch_assoc($masuk);

// Hitung total barang keluar hari ini
$keluar = mysqli_query($conn, "SELECT SUM(jumlah) as total FROM barang_keluar WHERE tanggal = '$today'");
$data_keluar = mysqli_fetch_assoc($keluar);
?>

<h1 class="mb-4 text-center text-primary">Dashboard Gudang</h1>

<div class="row">
  <!-- Total Produk Card -->
  <div class="col-md-4">
    <div class="card shadow-lg border-success">
      <div class="card-body text-center text-bg-success">
        <h5 class="card-title"><i class="bi bi-boxes"></i> Total Produk</h5>
        <p class="card-text fs-3 fw-bold"><?= $data_produk['total'] ?? 0; ?> Produk</p>
      </div>
    </div>
  </div>
  
  <!-- Barang Masuk Hari Ini Card -->
  <div class="col-md-4">
    <div class="card shadow-lg border-info">
      <div class="card-body text-center text-bg-info">
        <h5 class="card-title"><i class="bi bi-arrow-down-circle"></i> Barang Masuk Hari Ini</h5>
        <p class="card-text fs-3 fw-bold"><?= $data_masuk['total'] ?? 0; ?> Barang</p>
      </div>
    </div>
  </div>
  
  <!-- Barang Keluar Hari Ini Card -->
  <div class="col-md-4">
    <div class="card shadow-lg border-warning">
      <div class="card-body text-center text-bg-warning">
        <h5 class="card-title"><i class="bi bi-arrow-up-circle"></i> Barang Keluar Hari Ini</h5>
        <p class="card-text fs-3 fw-bold"><?= $data_keluar['total'] ?? 0; ?> Barang</p>
      </div>
    </div>
  </div>
</div>

<!-- Grafik Stok Produk -->
<div class="row mt-4">
  <div class="col-md-12">
    <div class="card shadow-lg">
      <div class="card-body">
        <h5 class="card-title text-center"><i class="bi bi-bar-chart-fill"></i> Grafik Stok Produk</h5>
        <canvas id="stokChart"></canvas>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('stokChart').getContext('2d');
  const stokChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Produk A', 'Produk B', 'Produk C'], // Ganti dengan data produk
      datasets: [{
        label: 'Stok Produk',
        data: [10, 20, 30], // Ganti dengan data stok produk dari database
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

<?php include 'template/footer.php'; ?>
