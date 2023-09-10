<?php

if(isset($_POST['submit'])){

    require "./koneksi.php";
    session_start();

    $user_id = $_SESSION['user_id'];
    $photo_id = $_POST['photo_id'];
    $isi_komentar = htmlspecialchars($_POST['komentar']);
    $tanggal = date('Y-m-d');

    if(empty($tanggal) || empty($isi_komentar)){
        echo "<script>alert('Gagal Menambahkan data karena salah satu data kosong')</script>";
        header("Location: ./komentar.php");
    }


    
    $sql = "INSERT INTO comments VALUES (null,$user_id,$photo_id,'$isi_komentar','$tanggal')";
    $query = mysqli_query($conn, $sql);
    
    if($query){
    echo "<script>alert('Berhasil Menambahkan data')</script>";
    echo "<script>window.location.href='komentar.php?photo_id=$photo_id'</script>";
    exit;
    // return false;
    }else{
        echo "<script>alert('Gagal Menambahkan data')</script>";
        echo "<script>window.location.href='komentar.php?photo_id=$photo_id'</script>";
        return false;
    }

}

?>