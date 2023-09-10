<?php

require "./koneksi.php";

if(!isset($_SESSION['user']) && !isset($_SESSION['user_id'])){
    header('Location: ./login.php');
    exit;
   
    
}
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM albums WHERE user_id = $user_id";
    $query = mysqli_query($conn, $sql);


?>

<?php require "./components/header.php" ?>
<?php require "./components/navbar.php" ?>
<main class="w-full min-h-screen py-20">
    <h1 class="py-10 text-2xl font-bold text-center text-sky-600">Galery Album dari <span class="capitalize"><?= $_SESSION['user']?></span></h1>
    <div class="grid grid-cols-1 gap-10 px-10 mx-auto md:items-center md:grid-cols-4">
        <?php foreach ($query as $row) : ?>
                <div class="flex flex-col items-center justify-center gap-5 p-5 duration-200 rounded-xl bg-sky-600 hover:bg-sky-800">
                    <span class="text-4xl text-center text-white">
                        <i class="fa fa-address-book-o" aria-hidden="true"></i>
                    </span>
                    <h2 class="text-xl font-bold text-white"><?= $row['nama_album'] ?></h2>
                    <div class="flex flex-row justify-center w-full gap-4 md:px-5">
                        <a class="px-3 py-1 text-white bg-green-600 border-2 rounded-xl hover:bg-green-800" href="./lihat-gambar.php?album_id=<?=$row['album_id']?>" >lihat</a>
                        <a class="px-3 py-1 text-white bg-yellow-600 border-2 rounded-xl hover:bg-yellow-800" href="./edit-album.php?album_id=<?=$row['album_id']?>" >edit</a>
                        <a onclick="return confirm('Data anda akan dihapus, Yakin ?')" class="px-3 py-1 text-white bg-red-600 border-2 rounded-xl hover:bg-red-800" href="./hapus-album.php?album_id=<?=$row['album_id']?>" >hapus</a>
                    </div>
                </div>
        <?php endforeach ?>
    </div>
</main>
<?php require "./components/footer.php" ?>