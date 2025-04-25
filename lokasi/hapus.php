<?php
include '../koneksi.php';

$id = $_GET['id'];

// Mengecek apakah produk dengan id tersebut ada
$query = mysqli_query($conn, "SELECT * FROM lokasi WHERE id_lokasi = $id");
if (mysqli_num_rows($query) > 0) {
    mysqli_query($conn, "DELETE FROM lokasi WHERE id_lokasi = $id");
    header("Location: index.php");
} else {
    echo "Lokasi tidak ditemukan!";
}
?>
