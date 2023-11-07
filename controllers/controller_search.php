<?php
$db = connectDB();
$keywords = strtolower(strval(urldecode(trim($_GET['keywords']))));
$sql = $db->prepare("SELECT * FROM picture WHERE title LIKE '%".$keywords."%' OR description LIKE '%".$keywords."%' OR src LIKE '%".$keywords."%' OR author LIKE '%".$keywords."%'");
$sql->execute();
$pictures = $sql->fetchAll(PDO::FETCH_ASSOC);

include "./views/layout.phtml";