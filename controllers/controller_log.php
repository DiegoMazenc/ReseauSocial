<?php
if(isset($_POST['inscription'])){
    $db = connectDB();
    $hash = password_hash(strip_tags($_POST['password']), PASSWORD_BCRYPT);
    $sql = $db->prepare('INSERT INTO users (firstname,name,pseudo,gender,mail,password) VALUES(?,?,?,?,?,?)'); 
    $sql->execute([$_POST['firstname'],$_POST['name'],$_POST['pseudo'],$_POST['gender'],$_POST['mail'],$hash]);

    header("Location: index.php?page=home");
    exit;
    
}

$userConnect = '';
$alertConnect = '';



if (isset($_POST['submit'])) {
    $db = connectDB();

    $sql = $db->prepare('SELECT * FROM users WHERE pseudo = ?');
    $sql->execute(array($_POST['pseudo']));
    $user = $sql->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($_POST['password'], $user['password'])) {
        
        // Le mot de passe saisi correspond au hachage stocké en base de données
        $_SESSION['pseudo'] = $user['pseudo'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['admin'] = $user['admin'];

        $id = $_SESSION['id'];

        $sql = $db->prepare("SELECT *, photo.src AS photo_src FROM users INNER JOIN photo ON photo.id = users.id_photo WHERE users.id=$id");
        $sql->execute();
        $photo = $sql->fetch(PDO::FETCH_ASSOC);
    
        $_SESSION['photo'] = $photo['photo_src'];
        header("Location: index.php?page=adminlist");
        exit;
    } else {
        $alertConnect = "Utilisateur non trouvé ou mot de passe incorrect";
    }

}


// --- on charge la vue
include "./views/layout.phtml";




// if (isset($_POST['submit'])) {

//     $db = connectDB();


//     $sql = $db->prepare('SELECT * FROM users WHERE pseudo = ? AND password = ?');
//     $sql->execute(array($_POST['pseudo'], $_POST['password']));
//     $connect = $sql->fetch(PDO::FETCH_ASSOC);

//     if ($connect) {
//         $_SESSION['pseudo'] = $connect['pseudo'];
//         $_SESSION['id'] = $connect['id'];
//         $_SESSION['admin'] = $connect['admin'];

//     } else {
//         $alertConnect = "Utilisateur non trouvé";
//     }

//     header("Location: index.php?page=home");
// exit;
// }
