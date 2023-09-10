<?php
require "./koneksi.php";

if (isset($_POST['submit'])) {
    $photo_id = $_POST['photo_id'];
    $judul = htmlspecialchars($_POST['judul']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $visibility = $_POST['visibility'];
    $album_id = $_POST['album_id'];
    $gambar_lama = $_POST['gambar_lama'];

    // Periksa apakah gambar diunggah dengan benar
    if ($_FILES['file-gambar']['error'] == 0) {
        $fileGambar = $_FILES['file-gambar']['name'];
        $ukuranFileGambar = $_FILES['file-gambar']['size'];
        $erorFileGambar = $_FILES['file-gambar']['error'];
        $tmpFileGambar = $_FILES['file-gambar']['tmp_name'];

        // Validasi ekstensi gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = pathinfo($fileGambar, PATHINFO_EXTENSION);
        $ekstensiGambar = strtolower($ekstensiGambar);

        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>alert('Upload Gagal, data bukanlah gambar')</script>";
            echo "<script>window.location.href='index.php'</script>";
            exit;
        }

        $newFileName = uniqid() . '.' .$ekstensiGambar;


        // Validasi ukuran gambar
        if ($ukuranFileGambar > 1000000) {
            echo "<script>alert('Ukuran file gambar harus kurang dari 1MB')</script>";
            echo "<script>window.location.href='lihat-gambar.php?album_id=$album_id'</script>";
            exit;
        }

        // Memindahkan gambar ke folder uploads
        $targetFile = "uploads/" . $newFileName;
        move_uploaded_file($tmpFileGambar, $targetFile);

        unlink("./uploads/" . $gambar_lama);

        // Simpan gambar
        $queryUpdateFoto = "UPDATE photos SET judul = '$judul', deskripsi = '$deskripsi', file_foto = '$newFileName', visibility = '$visibility' WHERE photo_id = $photo_id";
    } else {
        // Jika tidak ada gambar yang diunggah
        $queryUpdateFoto = "UPDATE photos SET judul = '$judul', deskripsi = '$deskripsi', visibility = '$visibility' WHERE photo_id = $photo_id";
    }

    $result = mysqli_query($conn, $queryUpdateFoto);

    if ($result) {
        echo "<script>alert('Data berhasil diubah')</script>";
        echo "<script>window.location.href='index.php'</script>";
        exit;
    } else {
        echo "<script>alert('Data gagal diubah')</script>";
        echo "<script>window.location.href='index.php'</script>";
        exit;
    }
}
?>
