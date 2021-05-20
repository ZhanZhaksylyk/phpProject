<div class="d-flex border bg-white p-3 m-3">
    <div class="mr-4 mt-2 ml-3">
        <img src='<?php echo $book['image'] ?>' class="book_image" />
    </div>
    <div class="w-100 mt-2 ml-1">
        <div class="border p-2 mb-2">
            <?php
            echo $book["author"];
            ?>
        </div>
        <div class="border p-2 mb-2">
            <?php
            echo $book["title"];
            ?>
        </div>
        <div class="border p-2 mb-2">
            <?php
            echo $book["description"]; 
            ?>
        </div>
    </div>
</div>