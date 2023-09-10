<?php

require "./koneksi.php";
$album_id = $_GET['album_id'];

$sql = "DELETE FROM albums WHERE album_id = $album_id";
$query = mysqli_query($conn,$sql);

if($query){
    echo "<script>alert('Data berhasil dihapus');document.location.href='index.php'</script>";
}else{
    echo "<script>alert('Data gagal dihapus');document.location.href='index.php'</script>";
}

?>