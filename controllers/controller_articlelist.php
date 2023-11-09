<?php
require_once("./models/Picture.php");

    $id = $_SESSION['id'];
    $pictures = Picture::getListPublic($id);


include "./views/layout.phtml";

