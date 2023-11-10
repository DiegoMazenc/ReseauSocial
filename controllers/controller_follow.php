<?php

require_once("./services/database.php");

$db = connectDB();
$id_user = $_SESSION['id'];
$sql = $db->prepare("SELECT *,
friends.id_user AS id_user,
 photo.src AS photo_src,
 users.pseudo AS user_pseudo
FROM friends 
INNER JOIN users ON users.id = friends.id_follow
INNER JOIN photo ON photo.id = users.id_photo
WHERE id_user = $id_user");
$sql->execute();
$friends = $sql->fetchAll(PDO::FETCH_ASSOC);

include "./views/layout.phtml";