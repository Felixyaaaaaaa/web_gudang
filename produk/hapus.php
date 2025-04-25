<?php
include '../koneksi.php';

$id = $_GET['id'];

// Mengecek apakah produk dengan id tersebut ada
$query = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = $id");
if (mysqli_num_rows($query) > 0) {
    mysqli_query($conn, "DELETE FROM produk WHERE id_produk = $id");
    header("Location: index.php");
} else {
    echo "Produk tidak ditemukan!";
}
?>
