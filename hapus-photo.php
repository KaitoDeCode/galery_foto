<?php

require "./koneksi.php";
$photo_id = $_GET['photo_id'];

$sqlDua = "SELECT file_foto,album_id FROM photos WHERE photos_id = $photo_id";
$photo = mysqli_fetch_assoc(mysqli_query($conn,$sqlDua));
$sql = "DELETE FROM photos WHERE photos_id = $photo_id";
$album_id = $photo['album_id'];
$query = mysqli_query($conn,$sql);

if($photo){
    unlink("./uploads/" . $photo['file_foto']);    
}

if($query){
    echo "<script>alert('Data berhasil dihapus');document.location.href='lihat-gambar.php?album_id=$album_id'</script>";
}else{
    echo "<script>alert('Data gagal dihapus');document.location.href='lihat-gambar.php?album_id=$album_id'</script>";
}




?>