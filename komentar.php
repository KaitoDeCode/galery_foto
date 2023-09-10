<?php

require "./koneksi.php";
if(!isset($_SESSION['user']) && !isset($_SESSION['user_id'])){
    header('Location: ./login.php');
    exit;
}

    $photo_id = $_GET['photo_id'];
    $user_id = $_SESSION['user_id'];
    $query ="SELECT comments.*, user.username FROM comments INNER JOIN user ON comments.user_id = user.id";
    // $sql = "SELECT * FROM comments WHERE photo_id = $photo_id";
    $user = "SELECT username FROM user WHERE id = $user_id";
    // $userAll = "SELECT username FROM user";
    $query = mysqli_query($conn, $query);
    $username = mysqli_fetch_assoc(mysqli_query($conn, $user))['username'];
?>

<?php require "./components/header.php" ?>
<main class="min-h-screen">
    <a class="fixed z-20 w-20 px-3 text-center text-white rounded-lg top-5 right-5 bg-sky-600 hover:bg-sky-800" href="./gambar-public.php">Back</a>
    <div class="flex flex-col gap-5 mt-10">
        <?php foreach($query as $row) : ?>
            <div class="flex flex-col p-3 ml-5 border rounded-lg w-52 border-sky-600 ">
                <div class="flex justify-between border-b border-slate-400">
                    <h3 class="text-lg font-bold capitalize <?= $row['username'] == $username ? 'text-green-600' : 'text-sky-600' ?>"><?=$row['username'] ?></h3>
                    <?php 
                        if($row['username'] == $username):
                    ?>
                    <div class="flex flex-row items-center justify-center gap-4">
                        <a href="edit-komentar.php?comment_id=<?= $row['comment_id'] ?>">
                            <span class="text-xl cursor-pointer"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></span>
                        </a>
                        <form action="hapus-komentar.php" method="post">
                            <input type="hidden" name="comment_id" value="<?=$row["comment_id"]?>">
                            <input type="hidden" name="photo_id" value="<?=$row["photo_id"]?>">
                            <button onclick="return confirm('Data Anda akan dihapus, Anda Yakin ?')" type="submit" name="submit">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                    <?php endif;?>
                </div>    
                <div class="border-b border-slate-400">
                    <p class="mt-3 text-slate-600"><?= $row['isi_komentar'] ?></p>
                </div>            
                <p class="mt-5 text-sm text-end text-slate-500"><?= $row['waktu_komentar'] ?></p>    
            </div>        
        <?php endforeach ?>        
    </div>
    
    <div class="fixed p-10 left-0 right-0 z-20 w-full h-[15vh] flex items-center  bg-sky-600 bottom-0 mt-10">
        <form class="flex flex-row items-center justify-between w-full" action="proses-tambah-komentar.php" method="post">
        <input type="hidden" name="photo_id" value="<?= $photo_id ?>">
            <input class="px-3 py-2 w-60 rounded-xl" type="text" name="komentar" id="komentar" placeholder="komentarmu....">
            <button class="text-2xl duration-200 rounded-full text-slate-200 hover:text-slate-400" type="submit" name="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
        </form>
    </div>
</main>
<?php require "./components/footer.php" ?>