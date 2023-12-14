<?php

require "./koneksi.php";
if(!isset($_SESSION['user']) && !isset($_SESSION['user_id'])){
    header('Location: ./login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT photos.* FROM photos INNER JOIN favorite ON photos.photos_id = favorite.photo_id WHERE favorite.user_id = $user_id";
$query = mysqli_query($conn, $sql);


?>


<?php require "./components/header.php" ?>
<?php require "./components/navbar.php" ?>

<main class="min-h-screen px-5 mx-auto py-60">
<div class="grid grid-cols-1 gap-20 px-10 md:gap-10 md:grid-cols-4">
    <?php foreach($query as $row) : ?>
       <div class="flex flex-col justify-between overflow-hidden border rounded-lg shadow-xl border-slate-400">
        <img class="object-cover object-center w-full max-h-60" src="./uploads/<?=$row['file_foto']?>" alt="">
        <div class="p-3 shadow-xl">
            <h3 class="text-xl text-sky-600"><?= $row['judul'] ?></h3>
            <p><?= $row['deskripsi'] ?></p>
            <div class="flex flex-row-reverse justify-between w-full mt-5">
                <form action="./proses-tambah-favorite.php" method="post">
                    <input type="hidden" name="photo_id" value="<?= $row['photos_id']?>">
                        <button onclick="return confirm('Data anda akan dihapus, Yakin ?')"  id="submit" class="text-2xl duration-200 text-slate-400 ursor-pointer hover:text-red-600" type="submit" name="submit" > <i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
                <a  href="./komentar.php?photo_id=<?= $row['photos_id'] ?>">
               
                                <button class="px-3 py-1 text-white rounded-lg bg-sky-600 hover:bg-sky-800">Komentar</button>
                </a>
            </div>
        </div>
       </div>
    <?php endforeach?>
</main>

<?php require "./components/footer.php" ?>