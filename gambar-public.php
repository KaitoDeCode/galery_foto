<?php


require "./koneksi.php";
if(!isset($_SESSION['user']) && !isset($_SESSION['user_id'])){
    header('Location: ./login.php');
    exit;
}

$sql = "SELECT * FROM photos WHERE visibility = 'public'";
$result = mysqli_query($conn, $sql);


?>
<?php require "./components/header.php" ?>
<?php require "./components/navbar.php" ?>
<main>
    <h1>Foto public</h1>
    <div class="grid grid-cols-1 gap-40 px-10 mt-32 mb-20 g md:py-20 md:px-72 md:grid-cols-2">
        <?php foreach ($result as $row): ?>
            <div class="flex flex-col justify-between pb-5 overflow-hidden border-2 rounded-lg border-sky-600">
                <img class="object-cover object-center w-full" src="./uploads/<?=$row['file_foto'] ?>" alt="">
                <div class="px-5">
                    <h2 class="text-xl font-bold text-sky-600"><?= $row['judul'] ?></h2>
                    <p class="h-20 overflow-hidden text-slate-500"><?= $row['deskripsi'] ?></p>
                    <div class="flex flex-row items-center justify-end gap-4">
                        <a href="./komentar.php?photo_id=<?= $row['photos_id'] ?>">
                            <button class="px-3 py-1 text-white rounded-lg bg-sky-600 hover:bg-sky-800">Komentar</button>
                        </a>
                        <form action="./proses-tambah-favorite.php" method="post">
                            <input type="hidden" name="photo_id" value="<?= $row['photos_id']?>">
                            <button class="text-2xl duration-200 cursor-pointer text-slate-400 hover:text-slate-600 active:bg-slate-600" type="submit" name="submit" ><i class='fa fa-heart' aria-hidden='true'?></i></button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</main>
<?php require "./components/footer.php" ?>