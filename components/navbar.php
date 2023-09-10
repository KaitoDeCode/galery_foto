<nav class="fixed top-0 z-50 flex flex-col w-full px-10 py-5 bg-white border-b-2 md:py-2 border-slate-200">
    <div class="flex flex-row items-center justify-between w-full">
        <span class="text-2xl font-bold text-sky-600 ">Galery Foto</span>
        <?php
        
        ?>
        <button onclick="showNavbar()" class="text-4xl text-sky-600"><i class="fa fa-bars" aria-hidden="true"></i></button>
    </div>
    <div>
        <ul id="nav-list" class="hidden">
            <li class="mt-2"><a class="duration-200 text-slate-500 hover:text-sky-600 hover:underline-offset-2 hover:underline hover:font-semibold" href="./">Beranda <i class="fa fa-home" aria-hidden="true"></i></a></li>
            <!-- <li class="mt-2"><a class="duration-200 text-slate-500 hover:text-sky-600 hover:underline-offset-2 hover:underline hover:font-semibold" href="./album?user_id='$_SESSION[user_id]'">Lihat Albumu <i class="fa fa-plus" aria-hidden="true"></i></a></li> -->
            <li class="mt-2"><a class="duration-200 text-slate-500 hover:text-sky-600 hover:underline-offset-2 hover:underline hover:font-semibold" href="./tambah-album.php">Tambah Album  <i class="fa fa-bookmark" aria-hidden="true"></i></a></li>
            <li class="mt-2"><a class="duration-200 text-slate-500 hover:text-sky-600 hover:underline-offset-2 hover:underline hover:font-semibold" href="./favorite.php">List Favorite <i class="fa fa-heart" aria-hidden="true"></i></i></a></li>
            <!-- <li class="mt-2"><a class="duration-200 text-slate-500 hover:text-sky-600 hover:underline-offset-2 hover:underline hover:font-semibold" href="./tambah-gambar.php">Tambah gambar  <i class="fa fa-plus" aria-hidden="true"></i></a></li> -->
            <li class="mt-2"><a class="duration-200 text-slate-500 hover:text-sky-600 hover:underline-offset-2 hover:underline hover:font-semibold" href="./gambar-public.php">Explore gambar public  <i class="fa fa-eye" aria-hidden="true"></i></a></li>
            <li class="mt-10"><a class="px-3 py-1 mt-20 text-red-600 duration-200 border border-red-600 rounded-lg hover:bg-red-600 hover:text-white active:bg-red-600 active:text-white hover:font-semibold active:font-semibold" href="./logout.php">Log out</a></li>
        </ul>
    </div>
</nav>