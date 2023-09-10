<?php
    require "./koneksi.php";
    if(isset($_POST["submit"])){
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars( $_POST["password"]);

        $cekUser = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");



        if(mysqli_num_rows($cekUser) > 0){

            //cek password
            $row = mysqli_fetch_assoc($cekUser);
            if(password_verify($password, $row["password"])){
                $_SESSION['user'] = $row["username"];
                $_SESSION['user_id'] = $row["id"];
                echo "<script>alert('Login Sukses')</script>";
                echo "<script>window.location.href='./index.php'</script>";
            }else{
                echo "<script>alert('Terdapat kesalahan di username atau password')</script>";
                echo "<script>window.location.href='login.php'</script>";
                return false;
            }
            
        }else{
            
            echo "<script>alert('Akun tidak ditemukan')</script>";
            echo "<script>window.location.href='login.php'</script>";
            
            return false;

        }
        

    }

?>