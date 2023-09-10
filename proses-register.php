<?php

require "./koneksi.php";

if(isset($_POST['submit'])){
        
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);

    $checkUsername = "SELECT username FROM user WHERE username = '$username'";

    if(mysqli_num_rows(mysqli_query($conn,$checkUsername)) > 0){
        echo "<script> 
        alert('username sudah digunakan');
        window.location.href='./register.php';
         </script>";
      }

    if(empty($username) || empty($password )){
        echo "<script>alert('data harus dilengkapi semuanya')</script>";
            echo "<script>window.location.href='register.php'</script>";
    }else if($password != $password2){
        echo "<script>alert('Password tidak sama')</script>";
        echo "<script>window.location.href='register.php'</script>";
        
    }else if(strlen($password) < 8){
        echo "<script>alert('Password minimal 8 karakter')</script>";
        echo "<script>window.location.href='register.php'</script>";
        
    }else if(strlen($username) < 3){
        echo "<script>alert('Username minimal 3 karakter')</script>";
        echo "<script>window.location.href='register.php'</script>";
        
    }else{
        $password = password_hash($password,PASSWORD_DEFAULT);
        $query = mysqli_query($conn,"INSERT INTO user(`username`,`password`) VALUES('$username','$password')");
        if($query){
            echo "<script>alert('Data berhasil ditambahkan')</script>";
            echo "<script>window.location.href='login.php'</script>";
        }
    }
}

?>