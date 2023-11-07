<?php
$db = connectDB();
$sql = $db->prepare("SELECT * FROM picture ORDER BY id DESC LIMIT 3");
$sql->execute();
$pictures = $sql->fetchAll(PDO::FETCH_ASSOC);



include "./views/layout.phtml";
// --- la vue
