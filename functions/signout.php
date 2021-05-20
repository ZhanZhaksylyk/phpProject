<?php
include './database.php';
if ($_POST['action']='signout'){
    unset($_SESSION['user']);
    unset($_SESSION['user_id']);
}
?>