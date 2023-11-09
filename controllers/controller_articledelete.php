<?php
require_once("./models/Picture.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $actif = 'non';
    Picture::deletePicture($actif, $id);
    header('Location: index.php?page=home'); 
    exit();
}

