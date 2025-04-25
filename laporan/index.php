<?php include '../template/header.php'; ?>
<h3>Laporan Gudang</h3>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="masuk-tab" data-bs-toggle="tab" data-bs-target="#masuk" type="button">Barang Masuk</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="keluar-tab" data-bs-toggle="tab" data-bs-target="#keluar" type="button">Barang Keluar</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="stok-tab" data-bs-toggle="tab" data-bs-target="#stok" type="button">Stok</button>
  </li>
</ul>

<div class="tab-content mt-3" id="myTabContent">
  <!-- Barang Masuk -->
  <div class="tab-pane fade show active" id="masuk">
    <?php include 'laporan_masuk.php'; ?>
  </div>

  <!-- Barang Keluar -->
  <div class="tab-pane fade" id="keluar">
    <?php include 'laporan_keluar.php'; ?>
  </div>

  <!-- Stok -->
  <div class="tab-pane fade" id="stok">
    <?php include 'laporan_stok.php'; ?>
  </div>
</div>

<?php include '../template/footer.php'; ?>
