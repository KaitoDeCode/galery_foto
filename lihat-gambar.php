<?php
 if(isset($_GET['album_id'])){

    require "./koneksi.php";
    $album_id = $_GET['album_id'];
    $queryAlbum = "SELECT * FROM albums WHERE album_id = $album_id";
    $dataAlbum = mysqli_fetch_assoc(mysqli_query($conn, $queryAlbum));
    $sql = "SELECT * FROM photos WHERE album_id = $album_id";
    $sqlFoto = "SELECT file_foto FROM photos WHERE album_id = $album_id";
    $photos = mysqli_query($conn, $sql);
    $gambar_lama = mysqli_fetch_assoc(mysqli_query($conn,$sqlFoto));
   
} else {
    echo "<script> alert('Album tidak ditemukan'); </script>";
    header("Location: ./index");
}

?>

<?php require "./components/header.php" ?>
<div class="items-center justify-start w-full p-3">
    <a href="./index.php"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
</div>
<main class="flex-col min-h-screen py-5 md:flex-row">
    <h1 class="text-2xl font-bold text-center text-sky-600">Isi dari Album <?= $dataAlbum['nama_album'] ?> </h1>
    <div class="flex flex-col px-10 mt-10 md:flex-row">
        <div class="z-20 flex p-10 md:w-1/3">
             <form action="proses-tambah-gambar.php" method="post" class="sticky flex flex-col w-full gap-5 top-10 Z-40" enctype="multipart/form-data" >
             <input type="hidden" name="gambar_lama" value="<?= $photo['file_foto']; ?>">
             <h2 class="text-xl font-bold text-center text-sky-600">Tambah Gambar</h2>
     
             <!-- judul -->
             <label class="flex flex-col" for="judul">
                 <span class="font-semibold text-md text-sky-600">Judul:</span>
                 <input class="px-3 py-2 duration-200 border-2 rounded-lg outline-none text-slate-500 border-slate-400 focus:border-2 focus:border-sky-600 focus:text-sky-600 placeholder:text-slate-400" placeholder="masukan judul" type="text" name="judul" id="judul" required >
             </label>
     
             <!-- Deskripsi -->
             <label class="flex flex-col" for="deskripsi">
                 <span class="font-semibold text-md text-sky-600">Deskripsi:</span>
                 <textarea class="px-3 py-2 duration-200 border-2 rounded-lg outline-none text-slate-500 border-slate-400 focus:border-2 focus:border-sky-600 focus:text-sky-600 placeholder:text-slate-400" placeholder="masukan deskripsi" name="deskripsi" id="deskripsi" required ></textarea>
             </label>
     
             <label class="flex flex-col" for="file-gambar">
                 <span class="font-semibold text-md text-sky-600">Gambar :</span>
                 
                 <input class="px-3 py-2 duration-200 border-2 rounded-lg outline-none text-slate-500 border-slate-400 focus:border-2 focus:border-sky-600 focus:text-sky-600 placeholder:text-slate-400" type="file"name="file-gambar" id="file-gambar" required>
             </label>
             <div>
                <span class="font-semibold text-sky-600">Posting sebagai:</span>
                <label class="flex gap-3 cursor-pointer" for="public">
                    <input type="radio" name="visibility" id="public" value="public" required >
                    <span class="text-slate-500">Public</span>
                </label>
                <label class="flex gap-3 cursor-pointer" for="private">
                    <input type="radio" name="visibility" id="private" value="private" required >
                    <span class="text-slate-500">private</span>
                </label>
                <input type="hidden" name="album_id" value='<?= $album_id ?>'>
             </div>
             <button class="w-full px-6 py-2 mt-10 text-white duration-200 rounded-lg bg-sky-600 hover:bg-sky-800 active:bg-sky-800" name="submit" type="submit">Submit</button>
         </form>
        </div>
        <div class="grid grid-cols-1 gap-10 mt-10 mb-20 md:px-20 md:w-2/3">
         <?php foreach ($photos as $photo) : ?>
             <div class="w-full border-2">
                 <img class="object-cover object-center w-full" src="uploads/<?= $photo['file_foto'] ?>" alt="foto">
                 <hr>
                 <div class="p-5">
                    <h3 class="text-2xl font-semibold text-sky-600"><?= $photo['judul'] ?></h3>
                    <p class="mb-3 text-slate-500"><?= $photo['deskripsi'] ?></p>
                    <div class="flex flex-row justify-between">
                        
                        <?php
                        if($photo['visibility'] == 'public'){
                            ?>
                    <div class=""><?= $photo['visibility'] ?></div>
                    <?php } else {?>
                        <div class="w-20 px-3 py-1 rounded-lg text-slate-200 bg-sky-600"><?= $photo['visibility']?></div>
                        <?php }?>

                        <div class="flex flex-row items-center justify-center gap-3">
                            <a class="flex items-center justify-center w-8 h-8 text-lg text-white duration-200 bg-yellow-600 rounded-full hover:bg-yellow-800" href="edit-photo.php?photo_id=<?= $photo['photos_id']?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a onclick="return confirm('Data anda akan dihapus, Yakin ?')" class="flex items-center justify-center w-8 h-8 text-lg text-white duration-200 bg-red-600 rounded-full hover:bg-red-800" href="hapus-photo.php?photo_id=<?=$photo['photos_id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
             </div>
         <?php endforeach ?>
        </div>
    </div>
</main>
<?php require "./components/footer.php" ?>