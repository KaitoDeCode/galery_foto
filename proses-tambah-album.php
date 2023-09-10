<?php

    
    require "./koneksi.php";

    if(isset($_POST['submit'])){
        $nama_album = htmlspecialchars($_POST['nama-album']);
        $userSession = $_SESSION['user'];
        
        $queryUser = "SELECT id FROM user WHERE username = '$userSession'";
        $result = mysqli_query($conn,$queryUser);
       

        if($result){
            
            //mendapatkan nilai ID dari user
            $row = mysqli_fetch_assoc($result);
            $user_id = $row['id'];
            
            //insert album baru ke database
            $sql = "INSERT INTO albums (`album_id`,`user_id`,`nama_album`) VALUES(null,$user_id,'$nama_album')";
            $query = mysqli_query($conn,$sql);
            
            if($query){
                $_SESSION['user_id'] = $user_id;
                echo "<script>alert('Album berhasil ditambahkan')</script>";
                echo "<script>window.location.href='./index.php'</script>";
            }else{
                echo "<script>alert('Album gagal ditambahkan')</script>";
                echo "<script>window.location.href='./tambah-album.php'</script>";
            }
        }

    }
?>