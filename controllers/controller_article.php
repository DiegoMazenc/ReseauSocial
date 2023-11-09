<?php

$db = connectDB();
$id = $_GET['id'];
require_once("./models/Picture.php");
require_once("./models/Comment.php");
require_once("./models/Likes.php");

//Génère la photo
$pictures = Picture::getAllArticle();


//=====COMMENTAIRES=====\\

//Appel des commentaires
$comments = Comment::getAllComment($id)[0];

//Compteur commentaires
$nbrCom = Comment::getAllComment($id)[1];

//Insérer un commentaire
if (isset($_POST['valider'])) {
    $id_user = $_SESSION['id'];
    $com = $_POST['com'];
    Comment::insertComment($id, $id_user, $com);
}

//Supprimer un commentaire
if (isset($_POST['supprimer'])) {
    $comment_id = $_POST['comment_id'];
    Comment::deleteComment($comment_id);
}


//=====LIKES=====\\

//compteur Like
$nbrLike = Likes::cntLikes($id);

//compteur Unlike
$unlike = Likes::cntUnlikes($id);


//Insert Like
if (isset($_POST['like'])) {
    $id_user = $_POST['id_user'];
    $id_picture = $_POST['id_picture'];
    Likes::insertLike($id_picture, $id_user);
    header("Location: index.php?page=article&id=$id");
    exit;

}

//Delete Like
if (isset($_POST['unlike'])) {
    $id_user = $_POST['id_user'];
    $id_picture = $_POST['id_picture'];
    Likes::deleteLike($id_picture, $id_user);
    header("Location: index.php?page=article&id=$id");
    exit;

}
    
include "./views/layout.phtml";
