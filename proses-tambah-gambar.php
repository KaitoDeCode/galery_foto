    <?php
    if(isset($_POST['submit'])){


        require "./koneksi.php";
        // session_start();
        $user_id = $_SESSION['user_id'];

        $fileGambar = $_FILES['file-gambar']['name'];
        $ukuranFileGambar = $_FILES['file-gambar']['size'];
        $erorFileGambar = $_FILES['file-gambar']['error'];
        $tmpFileGambar = $_FILES['file-gambar']['tmp_name'];

        $judul = htmlspecialchars($_POST['judul']);
        $deskripsi = htmlspecialchars($_POST['deskripsi']);
        $visibility = $_POST['visibility'];
        $album_id = $_POST['album_id'];

       

        if(empty($judul) || empty($deskripsi) || empty($visibility)){
            echo "<script>alert('Upload Gagal ada salah satu data kosong')</script>";
            echo "<script>window.location.href='lihat-gambar.php?album_id=$album_id'</script>";
            return false;
        }

        

        // $ekstensiGambarValid=['jpg','jpeg','png'];
        // $ekstensiGambar = explode('.',$fileGambar);
        // $ekstensiGambar = strtolower(end($ekstensiGambar));

        // if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
        //     echo "script>alert('Upload Gagal data bukanlah gambar')</script>";
        //     echo "<script>window.location.href='lihat-gambar.php?album_id=$album_id'</script>";
        //     return false;
        // }

         // Validasi ekstensi gambar
         $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
         $ekstensiGambar = pathinfo($fileGambar, PATHINFO_EXTENSION);
         $ekstensiGambar = strtolower($ekstensiGambar);
 
         if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
             echo "<script>alert('Upload Gagal, data bukanlah gambar')</script>";
             echo "<script>window.location.href='lihat-gambar.php?album_id=$album_id'</script>";
             exit;
         }

         

        $newFileName = uniqid() . '.' . $ekstensiGambar;

        if($ukuranFileGambar > 1000000){
            echo '<script>alert("Upload Gagal gambar hanya boleh dibawah 1MB")</script>';
            echo "<script>window.location.href='lihat-gambar.php?album_id=$album_id'</script>";
            return false;
        }

        
        move_uploaded_file($tmpFileGambar,"uploads/" . $newFileName);
        // var_dump();
        $sql = "INSERT INTO photos VALUES (null,$album_id,'$judul','$deskripsi','$newFileName','$visibility')";
        // echo "aksdjkads";
        $query = mysqli_query($conn,$sql);
       

        if($query){
            echo "<script>alert('Upload Berhasil')</script>";
            echo "<script>window.location.href='lihat-gambar.php?album_id=$album_id'</script>";
            return false;
        }else{
            echo "Error: " . mysqli_error($conn);
            echo "<script>alert('Upload Gagal')</script>";
            echo "<script>window.location.href='lihat-gambar.php?album_id=$album_id'</script>";
            return false;
        }  

        // if($visibility == "public"){
        //     $photo_id_sql = "SELECT photo_id FROM photos WHERE album_id = $album_id";


        //     $photo_id_row = mysqli_fetch_assoc(mysqli_query($conn, $photo_id_sql));
        //     $photo_id = $photo_id_row['$photo_id'];

        //     $sql = "INSERT INTO post VALUES(null,$user_id,$album_id,$photo_id)";
        //     mysqli_query($conn, $sql);
        // }
    }
    ?>