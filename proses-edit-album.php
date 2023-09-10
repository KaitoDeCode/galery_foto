<?php
if (isset($_POST['submit'])) {
    require "./koneksi.php";

    $album_id = $_POST['album_id'];
    $nama_album_baru = htmlspecialchars($_POST['nama_album']);
    $sql = "UPDATE albums SET nama_album = '$nama_album_baru' WHERE album_id = $album_id";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>alert('Album berhasil diubah');window.location.href='index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Data gagal diubah');window.location.href='index.php';</script>";
        return false;
    }
}
?>
