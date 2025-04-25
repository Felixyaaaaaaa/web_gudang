<?php
include '../koneksi.php';
include '../template/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];
    $id_lokasi = $_POST['id_lokasi'];
    $keterangan = $_POST['keterangan']; // Menangkap data keterangan

    // Menambahkan data barang masuk ke database
    $query = "INSERT INTO barang_masuk (id_produk, jumlah, tanggal, id_lokasi, keterangan) 
VALUES ('$id_produk', '$jumlah', '$tanggal', '$id_lokasi', '$keterangan')";
    mysqli_query($conn, $query);

    // Update atau insert ke tabel stok
    $cekStok = mysqli_query($conn, "SELECT * FROM stok WHERE id_produk = '$id_produk' AND id_lokasi = '$id_lokasi'");
    if (mysqli_num_rows($cekStok) > 0) {
        // Jika stok sudah ada, update jumlahnya
        mysqli_query($conn, "UPDATE stok SET 
jumlah = jumlah + $jumlah, 
tanggal_update = NOW() 
WHERE id_produk = '$id_produk' AND id_lokasi = '$id_lokasi'");
    } else {
        // Jika belum ada stok, tambahkan entri baru
        mysqli_query($conn, "INSERT INTO stok (id_produk, id_lokasi, jumlah, tanggal_update) 
VALUES ('$id_produk', '$id_lokasi', '$jumlah', NOW())");
    }


    // Mengalihkan ke halaman utama setelah berhasil
    header("Location: index.php");
}


$produk = mysqli_query($conn, "SELECT * FROM produk");
$lokasi = mysqli_query($conn, "SELECT * FROM lokasi");
?>

<h3>Tambah Barang Masuk</h3>
<form method="POST">
    <div class="mb-3">
        <label>Produk</label>
        <select name="id_produk" class="form-control" required>
            <option value="">Pilih Produk</option>
            <?php while ($row = mysqli_fetch_assoc($produk)) : ?>
                <option value="<?= $row['id_produk'] ?>"><?= $row['nama_produk'] ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Lokasi Penyimpanan</label>
        <select name="id_lokasi" class="form-control" required>
            <option value="">Pilih Lokasi</option>
            <?php while ($row = mysqli_fetch_assoc($lokasi)) : ?>
                <option value="<?= $row['id_lokasi'] ?>"><?= $row['kode_lokasi'] ?> - <?= $row['deskripsi'] ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Keterangan (Opsional)</label>
        <textarea name="keterangan" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<?php include '../template/footer.php'; ?>