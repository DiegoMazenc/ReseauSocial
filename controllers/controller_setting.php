<?php
require_once("./models/Users.php");
$id = $_SESSION['id'];
$user = Users::getUser($id);

if (isset($_POST['updateInfos'])) {
    $new_firstname = strip_tags($_POST['firstname']);
    $new_name = strip_tags($_POST['name']);
    $new_pseudo = strip_tags($_POST['pseudo']);
    $new_gender = strip_tags($_POST['gender']);
    $new_mail = strip_tags($_POST['mail']);
    $new_password = password_hash(strip_tags($_POST['password']), PASSWORD_BCRYPT);

    try {
        Users::updateUser($new_firstname, $new_name, $new_pseudo, $new_gender, $new_mail, $new_password, $id);
        
    } catch (Exception $e) {
        $sqlError = $e->getMessage();
    }
}

include "./views/layout.phtml";