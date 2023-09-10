<?php

if(isset($_POST['submit'])){
    require "./koneksi.php";
    $comment_id = $_POST['comment_id'];
    $isi_komentar = htmlspecialchars($_POST['isi_komentar']);

    $sqlPhoto = "SELECT photo_id FROM comments WHERE comment_id = $comment_id";
    $photo_id = mysqli_fetch_assoc(mysqli_query($conn, $sqlPhoto))['photo_id'];

    if(empty($isi_komentar)){
        echo "<script>alert('Isi komentar terlebih dahulu')</script>";
        echo "<script>window.history.back()</script>";
    }

    $sql = "UPDATE comments SET isi_komentar = '$isi_komentar' WHERE comment_id = $comment_id";
    $query = mysqli_query($conn, $sql);

    if($query){
        echo "script>alert('Upload Gagal data bukanlah gambar')</script>";
        echo "<script>window.location.href='komentar.php?photo_id=$photo_id'</script>";
    }

}

?>