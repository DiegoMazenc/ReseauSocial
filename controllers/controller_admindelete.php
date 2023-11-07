<?php
if(isset($_GET['id'])){
    $db = connectDB();
    $id = $_GET['id'];
    $sql = $db->prepare('DELETE FROM picture WHERE id = ?'); 
    $sql->execute([$id]);
    header('Location: index.php?page=adminlist'); 
    exit();
}

