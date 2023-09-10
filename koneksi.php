<?php

    session_start();

    //koneksi database
    $conn = new mysqli("localhost","root","","galery_foto");

    //check koneksi
    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);   
    }

?>