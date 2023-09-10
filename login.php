<?php require "./koneksi.php";

if(isset($_SESSION[''])){
    header('Location: ./index.php');
    exit;
}

?>
<?php require "./components/header.php" ?>
<main class="flex flex-col justify-between min-h-screen p-20 md:px-80 md:py-20">
    <h1 class="text-4xl font-bold text-center text-sky-600">Halaman Login</h1>
    <form action="./proses-login.php" method="post" class="flex flex-col gap-5 md:px-52">

        <!-- username -->
        <label class="flex flex-col" for="username">
            <span class="text-lg font-semibold text-sky-600">Username:</span>
            <input class="px-3 py-2 duration-200 border-2 rounded-lg outline-none text-slate-500 border-slate-400 focus:border-2 focus:border-sky-600 focus:text-sky-600 placeholder:text-slate-400" placeholder="masukan namamu" type="text" name="username" id="username">
        </label>

        <!-- Password -->
        <label class="flex flex-col" for="password">
            <span class="text-lg font-semibold text-sky-600">Password:</span>
            <input class="px-3 py-2 duration-200 border-2 rounded-lg outline-none text-slate-500 border-slate-400 focus:border-2 focus:border-sky-600 focus:text-sky-600 placeholder:text-slate-400" placeholder="masukan passwordmu" type="password" name="password" id="password">
        </label>

        <button class="w-full px-6 py-2 mt-10 text-white duration-200 rounded-lg bg-sky-600 hover:bg-sky-800 active:bg-sky-800" name="submit" type="submit">Login</button>
    </form>
    <p class="mt-10 text-center text-slate-500">Belum punya Akun ? <a class="text-sky-600" href="./register.php">Register !</a></p>
</main>

<?php require "./components/footer.php" ?>