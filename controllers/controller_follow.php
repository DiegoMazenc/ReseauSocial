<?php

require_once("./services/database.php");

$db = connectDB();
$id_user = $_SESSION['id'];
@$followId = $_POST['followId'];

$sql = $db->prepare("DELETE FROM friends WHERE id_user=? AND id_follow=?");
$sql->execute([$id_user, $followId]);



$sql = $db->prepare("SELECT *,
    friends.id_user AS friend_id_user,
    friends.id_follow AS id_follow,
    users.src_photo AS photo_src,
    users.pseudo AS user_pseudo
FROM friends 
INNER JOIN users ON users.id = friends.id_follow
WHERE friends.id_user = :id_user");
$sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
$sql->execute();
$friends = $sql->fetchAll(PDO::FETCH_ASSOC);



include "./views/layout.phtml";