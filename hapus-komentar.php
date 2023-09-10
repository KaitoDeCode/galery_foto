<?php

    if(isset($_POST['submit'])){
        require "./koneksi.php";
        $comment_id = intval($_POST['comment_id']);
        $photo_id = intval($_POST['photo_id']);

        $sql = "DELETE FROM comments WHERE comment_id = $comment_id";
        $query = mysqli_query($conn, $sql);

        
        
        if ($query) {
            echo "<script>alert('Berhasil menghapus komentar'); window.location.href='komentar.php?photo_id=$photo_id'</script>";
        } else {
            echo "<script>alert('Gagal menghapus komentar: " . mysqli_error($conn) . "');window.location.href='komentar.php?photo_id=$photo_id'</script>";
        }

    }


    
    // var_dump($comment_id);
    // var_dump($query);


?>