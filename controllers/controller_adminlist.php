<?php
$id = $_SESSION['id'];
$db = connectDB();
$sql = $db->prepare("SELECT * FROM users WHERE id = $id ");
$sql->execute();
$user = $sql->fetch(PDO::FETCH_ASSOC);

if ((int)$_SESSION['admin'] == 1) {
    $sql = $db->prepare("SELECT *,picture.id AS picture_id , users.pseudo AS user_pseudo FROM picture INNER JOIN users ON users.id = picture.id_user ORDER BY picture_id DESC ");
    $sql->execute();
    $pictures = $sql->fetchAll(PDO::FETCH_ASSOC);
} else {

    $sql = $db->prepare("SELECT *,picture.id AS picture_id FROM picture WHERE id_user=$id ");
    $sql->execute();
    $pictures = $sql->fetchAll(PDO::FETCH_ASSOC);
}



include "./views/layout.phtml";
