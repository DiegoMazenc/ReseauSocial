<?php

$db = connectDB();
$id = $_GET['id'];
$sql = $db->prepare("SELECT *, 
users.pseudo AS user_pseudo 
FROM picture 
INNER JOIN users ON users.id = picture.id_user 
WHERE picture.id = $id");

$sql->execute();
$pictures = $sql->fetch(PDO::FETCH_ASSOC);




if (isset($_POST['valider'])) {
    $id_user = $_SESSION['id'];
    $com = $_POST['com'];


    $sql = $db->prepare('INSERT 
    INTO comment (id_picture,id_user,com) 
    VALUES(?,?,?)');

    $sql->execute(array($id, $id_user, $com));
}





if (isset($_POST['supprimer'])) {
    $comment_id = $_POST['comment_id'];

    $sql = $db->prepare("DELETE FROM comment WHERE id = ?");
    $sql->execute([$comment_id]);
}


$sql = $db->prepare(
    "SELECT *,
        comment.id AS comment_id, 
        users.pseudo AS user_pseudo, 
        users.id AS users_id,
        photo.src AS photo_src
    FROM comment 
    INNER JOIN users ON users.id = comment.id_user 
    INNER JOIN photo ON photo.id = users.id_photo
    WHERE id_picture = $id 
    ORDER BY comment.id DESC"
    );

$sql->execute();
$nbrCom = $sql->rowCount();

$comments = $sql->fetchAll(PDO::FETCH_ASSOC);



$sql = $db->prepare("SELECT * FROM likes WHERE id_picture = $id ");
$sql->execute();
$nbrLike = $sql->rowCount();

$sql = $db->prepare('SELECT * FROM likes WHERE id_user = ? AND id_picture = ?');
$sql->execute(array($_SESSION['id'], $id));
$unlike = $sql->fetch(PDO::FETCH_ASSOC);



if (isset($_POST['like'])) {
    $id_user = $_POST['id_user'];
    $id_picture = $_POST['id_picture'];

    $db = connectDB();
    $sql = $db->prepare( "INSERT INTO likes (id_picture,id_user)  VALUES(?,?)" );

    $sql->execute(array($id_picture, $id_user));
    header("Location: index.php?page=article&id=$id");
    exit;

}

if (isset($_POST['unlike'])) {
    $id_user = $_POST['id_user'];
    $id_picture = $_POST['id_picture'];

    $db = connectDB();
    $sql = $db->prepare( "DELETE FROM likes WHERE id_picture=? AND id_user=?");

    $sql->execute([$id_picture, $id_user]);
    header("Location: index.php?page=article&id=$id");
    exit;

}
    
include "./views/layout.phtml";
