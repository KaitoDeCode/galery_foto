<?php
require "./koneksi.php";
session_start(); // Mulai sesi jika belum dimulai

$user_id = $_SESSION['user_id']; // Pastikan user_id sudah di-set dalam sesi
$photo_id = mysqli_real_escape_string($conn, $_POST["photo_id"]); // Escape data inputan

// Periksa apakah data dengan photo_id dan user_id yang sama sudah ada dalam database
$sql_check = "SELECT * FROM favorite WHERE photo_id = $photo_id AND user_id = $user_id";
$result_check = mysqli_query($conn, $sql_check);

if (!$result_check) {
    // Penanganan kesalahan jika terjadi kesalahan dalam permintaan SQL SELECT
    echo "Terjadi kesalahan dalam database: " . mysqli_error($conn);
    exit;
}

if (mysqli_num_rows($result_check) > 0) {
    // Data dengan photo_id dan user_id yang sama sudah ada, lakukan DELETE
    $sql_delete = "DELETE FROM favorite WHERE photo_id = $photo_id AND user_id = $user_id";
    $query_delete = mysqli_query($conn, $sql_delete);

    if (!$query_delete) {
        // Penanganan kesalahan jika terjadi kesalahan dalam pernyataan SQL DELETE
        echo "Terjadi kesalahan dalam database: " . mysqli_error($conn);
        exit;
    }

    // Pesan jika data dihapus
    echo "Data berhasil dihapus dari database.";
} else {
    // Data dengan photo_id dan user_id yang sama belum ada, lakukan INSERT
    $sql_insert = "INSERT INTO favorite (user_id, photo_id) VALUES ($user_id, $photo_id)";
    $query_insert = mysqli_query($conn, $sql_insert);

    if (!$query_insert) {
        // Penanganan kesalahan jika terjadi kesalahan dalam pernyataan SQL INSERT
        echo "Terjadi kesalahan dalam database: " . mysqli_error($conn);
        exit;
    }

    // Pesan jika data diinsert
    echo "Data berhasil diinsert ke database.";
}

header("Location: ./gambar-public.php");
?>
