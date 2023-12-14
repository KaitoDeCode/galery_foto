<?php require "./components/header.php"?>

<?php

require "./koneksi.php";
    $photo_id = $_GET['photo_id'];
    $sql = "SELECT * FROM photos WHERE photos_id = $photo_id";
    $photo = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    
?>
<main class="px-10 py-10">  
        <form action="./proses-edit-photo.php" method="post" class="flex flex-col w-full gap-5" enctype="multipart/form-data" >
        <h2 class="text-xl font-bold text-center text-sky-600">Edit Gambar</h2>
        <input type="hidden" name="photos_id" value="<?=$photo['photos_id']?>">
        <input type="hidden" name="album_id" value="<?$photo['album_id'] ?>">
        <input type="hidden" name="gambar_lama" value="<?= $photo['file_foto']?>">
             <!-- judul -->
             <label class="flex flex-col" for="judul">
                 <span class="font-semibold text-md text-sky-600">Judul:</span>
                 <input value="<?= $photo['judul']?>" class="px-3 py-2 duration-200 border-2 rounded-lg outline-none text-slate-500 border-slate-400 focus:border-2 focus:border-sky-600 focus:text-sky-600 placeholder:text-slate-400" placeholder="masukan judul" type="text" name="judul" id="judul" >
             </label>

     
             <!-- Deskripsi -->
             <label class="flex flex-col" for="deskripsi">
                 <span class="font-semibold text-md text-sky-600">Deskripsi:</span>
                 <textarea class="px-3 py-2 duration-200 border-2 rounded-lg outline-none text-slate-500 border-slate-400 focus:border-2 focus:border-sky-600 focus:text-sky-600 placeholder:text-slate-400" placeholder="masukan deskripsi" name="deskripsi" id="deskripsi" ><?= $photo['deskripsi'] ?>
                </textarea>
             </label>
     
             <label class="flex flex-col" for="file-gambar">
                 <span class="font-semibold text-md text-sky-600">Gambar :</span>
                 <img src="./uploads/<?= $photo["file_foto"]?>" alt="gambar_lama">
                 <input class="px-3 py-2 duration-200 border-2 rounded-lg outline-none text-slate-500 border-slate-400 focus:border-2 focus:border-sky-600 focus:text-sky-600 placeholder:text-slate-400" type="file" accept="image/*" name="file-gambar" id="file-gambar" >
             </label>
             <div>
                <span class="font-semibold text-sky-600">Posting sebagai:</span>
                <label class="flex gap-3 cursor-pointer" for="public">
                    <input type="radio" name="visibility" id="public" <?= ($photo['visibility'] === "public") ? "checked" : ""; ?>  value="public"  >
                    <span class="text-slate-500">Public</span>
                </label>
                <label class="flex gap-3 cursor-pointer" for="private">
                    <input type="radio" name="visibility" id="private" <?= ($photo['visibility'] === "private") ? "checked" : ""; ?>  value="private"  >
                    <span class="text-slate-500">private</span>
                </label>
                
            </div>
            
            <button class="w-full px-6 py-2 mt-10 text-white duration-200 rounded-lg bg-sky-600 hover:bg-sky-800 active:bg-sky-800" name="submit" type="submit">Submit</button>
        </form>
</main> 
<?php require "./components/footer.php"?>