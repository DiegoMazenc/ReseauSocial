<?php
if(isset($_POST['submit'])){
    $db = connectDB();
    $hash = password_hash(strip_tags($_POST['password']), PASSWORD_BCRYPT);
    $sql = $db->prepare('INSERT INTO users (firstname,name,pseudo,gender,mail,password) VALUES(?,?,?,?,?,?)'); 
    $sql->execute([$_POST['firstname'],$_POST['name'],$_POST['pseudo'],$_POST['gender'],$_POST['mail'],$hash]);

    header("Location: index.php?page=home");
    exit;
    
}

// --- on charge la vue
include "./views/layout.phtml";