<?php
$url = '/phpProject/assets/images/wallpaper.jpg';
$title = 'Books';
include '../../init_src.php'; ?>
<div class="d-flex justify-content-center">
    <div class="d-flex flex-column col-12 col-md-8">
        <?php
        $user_id=$_SESSION['user_id'];

        $sql = "SELECT author,title,description,image FROM books where user_id like '$user_id'";
        $result=mysqli_query($conn,$sql);

        while($book = mysqli_fetch_assoc($result)){
            include 'book.php';
        }

?>
        <?php include 'upload_book.php';
        ?>
    </div>
</div>
<style>
    .book_image {
        width: 120px;
        height: 160px;
    }
</style>
<?php include '../../common/footer.php'; ?>