<?php
if(isset($_POST['submit'])){
    $db = connectDB();
    $sql = $db->prepare('INSERT INTO picture (src,title,description,id_user) VALUES(?,?,?,?)'); 
    $sql->execute([$_POST['src'],$_POST['title'],$_POST['description'],$_SESSION['id']]);

    header("Location: index.php?page=adminlist");
    exit;
    
}


include "./views/layout.phtml";