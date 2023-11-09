<?php
require_once("./models/Picture.php");

if(isset($_POST['submit'])){
    $src = $_POST['src'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $userId = $_SESSION['id'];
    Picture::insertPicture($src, $title, $description, $userId);
    header("Location: index.php?page=home");
    exit;
    
}


include "./views/layout.phtml";