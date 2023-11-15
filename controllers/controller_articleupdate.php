<?php

require_once("./models/Picture.php");

$id = $_GET['id'];
$picture = Picture::getArticleUpdate($id);

if (isset($_POST['submit'])) {
    
    $new_title = strip_tags($_POST['title']);
    $new_description = strip_tags($_POST['description']);
    
    $updateDate = date('Y-m-d H:i:s');

    try {
        $picture = Picture::updateArticle($new_title, $new_description, $updateDate, $id);
        
    } catch (Exception $e) {
        $sqlError = $e->getMessage();
    }

    header("Location: index.php?page=articlelist");
    exit;
}


// --- on charge la vue
include "./views/layout.phtml";