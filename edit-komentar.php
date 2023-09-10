<?php

require "./koneksi.php";
$comment_id = $_GET['comment_id'];

$sql = "SELECT * FROM comments WHERE comment_id = $comment_id";
$query = mysqli_fetch_assoc(mysqli_query($conn, $sql));

?>

<?php require "./components/header.php" ?>
<main class="flex items-center justify-center w-full min-h-screen">

<div class="mx-auto">
    <h1 class="mb-20 text-4xl font-bold text-sky-600">Edit Komentar</h1>
    <form class="flex flex-col" action="./proses-edit-komentar.php" method="post">
        
        <label class="flex flex-col" for="isi_komentar">
            <input type="hidden" name="comment_id" value="<?= $comment_id ?>">
            <span class="mb-3 text-lg text-slate-500">Komentar :</span>
            <input class="w-full px-3 py-2 mx-auto mb-5 duration-200 border-2 outline-none rounded-xl border-slate-400 text-slate-400 focus:border-sky-600 focus:text-sky-600" id="isi_komentar" type="text" value="<?= $query['isi_komentar']?>" name="isi_komentar">
        </label>
        <button class="py-2 text-white rounded-lg bg-sky-600" name="submit">Submit</button>
    </form>
</div>
    

</main>
<?php require "./components/footer.php" ?>