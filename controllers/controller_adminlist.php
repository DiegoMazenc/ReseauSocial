<?php
require_once("./models/Picture.php");

$pictures = Picture::getListAdmin();

require_once("./models/Users.php");


$users = Users::usersList();

if(isset($_POST['isAdmin'])){
    $id  = $_POST['userId'];
    $admin = $_POST['admin'];

    Users::updateAdmin($admin,$id);
    header('Location: index.php?page=adminlist'); 
}


include "./views/layout.phtml";

