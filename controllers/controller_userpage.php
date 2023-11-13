<?php
require_once("./models/Picture.php");
require_once("./models/Likes.php");
require_once("./models/Comment.php");
require_once("./models/Users.php");

if (isset($_POST['valider'])) {
    $id = $_POST['id_post'];
    $id_user = $_SESSION['id'];
    $com = $_POST['com'];
    Comment::insertComment($id, $id_user, $com);
    
    // Récupérez le nouveau commentaire
    $newComment = comment::getAllComment($id_picture)[0];

    // Générez le HTML du nouveau commentaire
    $newCommentHtml = '
        <div class="commentaires" id="commentaires' . $id_picture . '">
            <div class="comContent">
                <img src="' . $newComment['user_photo'] . '" alt="" class="userPhotoCom">
                <div class="idcom">
                    <div class="cadreCom">
                        <p class="userComment">' . $newComment['user_pseudo'] . '</p>
                        <p class="textComment">' . $newComment['com'] . '</p>
                    </div>
                    <div class="optionCom">
                        <p class="dateComment">' . $newComment['date_com'] . '</p>
                        ' . (isset($_SESSION['id']) && (int)$_SESSION['id'] === (int)$newComment['id_user'] ? '
                            <form method="POST" id="form_delete">
                                <input type="hidden" name="comment_id" value="' . $newComment['comment_id'] . '">
                                <input type="submit" name="supprimer" value="Supprimer" class="supprCom">
                            </form>' : '') . '
                    </div>
                </div>
            </div>
        </div>';

    // Retournez le HTML du nouveau commentaire dans la réponse JSON
    echo json_encode(['success' => true, 'commentHtml' => $newCommentHtml]);
    exit();
}




if (isset($_POST['submit'])) {

    $error = "";
    $tempFile = $_FILES["image_file"]["tmp_name"];
    $sizeFile = $_FILES["image_file"]["size"];
    $checkFile = @getimagesize($tempFile);

    $explode = explode("/", $checkFile['mime']);

    if ($checkFile) {
        if ($sizeFile < 1000000) {
            if ($explode[1] == 'jpeg' || $explode[1] == 'jpg' || $explode[1] == 'png') {

                $title = $_POST['title'];
                $description = $_POST['description'];
                $userId = $_SESSION['id'];
                $newFile = $_SESSION['pseudo'] .$title. time() . "." . $explode[1];
                $src = "./uploads/" . $newFile;

                move_uploaded_file($tempFile, "./uploads/" . $newFile);
                Picture::insertPicture($src, $title, $description, $userId);
               
             
            } else {
                $error = "Nous acceptons uniquement les formats .jpeg, .jpg .png";
            }
        } else {
            $error = "la taille de l'image doit être inférieur à 1Mo";
        }
    } else {
        $error = "Nous acceptons uniquement les images";
    }
}




if (isset($_POST['supprimer'])) {
    $comment_id = $_POST['comment_id'];
    Comment::deleteComment($comment_id);
}

if (isset($_POST['follow'])) {
    $id_sender = $_SESSION['id'];
    $id_receiver = $_POST['id_follow'];

    $db = connectDB();
    $sql = $db->prepare('INSERT INTO friends (id_user,id_follow) VALUES(?,?)');
    $sql->execute([$id_sender , $id_receiver]);
}

if (isset($_POST['unfollow'])) {
    $id_sender = $_SESSION['id'];
    $id_receiver = $_POST['id_follow'];

    $db = connectDB();
    $sql = $db->prepare('DELETE FROM friends WHERE id_user=? AND id_follow=?');
    $sql->execute([$id_sender , $id_receiver]);
}

    $db = connectDB();
    $id_user = $_SESSION['id'];
    $id = $_GET['id'];
    $sql = $db->prepare("SELECT * FROM friends WHERE id_user =$id_user AND id_follow=$id ");
    $sql->execute();
    $friends = $sql->fetch(PDO::FETCH_ASSOC);


$id = $_GET['id'];
$pictures = Picture::getUserArticle($id);
$photo = Users::userInfos($id);

include "./views/layout.phtml";

