<?php
$db = connectDB();
$sql = $db->prepare("SELECT picture.*,
 users.pseudo AS user_pseudo, 
 photo.src AS photo_src 
 FROM picture 
 INNER JOIN users ON users.id = picture.id_user 
 INNER JOIN photo ON photo.id = users.id_photo 
 ORDER BY picture.id DESC");
$sql->execute();
$pictures = $sql->fetchAll(PDO::FETCH_ASSOC);



$info = "Ceci est la galerie...";
// --- on charge la vue
include "./views/layout.phtml";
