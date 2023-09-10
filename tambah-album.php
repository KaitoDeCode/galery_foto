<?php


require "./koneksi.php";
if(!isset($_SESSION['user'])){
    header('Location: ./login.php');
    exit;
}

?>


<?php require "./components/header.php" ?>
<?php require "./components/navbar.php" ?>
<main class="flex flex-col justify-between min-h-screen p-20 md:px-80">
    <form action="./proses-tambah-album.php" method="post" class="flex flex-col md:px-40">
        <h1 class="my-20 text-4xl font-bold text-center text-sky-600">Tambah Album</h1>
        <!-- Nama Album -->
        <label class="flex flex-col" for="nama-album">
            <span class="text-lg font-semibold text-sky-600">Nama Album:</span>
            <input class="px-3 py-2 duration-200 border-2 rounded-lg outline-none text-slate-500 border-slate-400 focus:border-2 focus:border-sky-600 focus:text-sky-600 placeholder:text-slate-400" placeholder="masukan judul" type="text" name="nama-album" id="nama-album   ">
        </label>
        <button class="w-full px-6 py-2 mt-10 text-white duration-200 rounded-lg bg-sky-600 hover:bg-sky-800 active:bg-sky-800" name="submit" type="submit">Buat Album</button>
    </form>
</main>
x
<?php require "./components/footer.php" ?>