<?php
$db = connectDB();
$id = $_GET['id'];
$sql = $db->prepare("SELECT * FROM picture WHERE id = ?");
$sql->execute([$id]);
$picture = $sql->fetch(PDO::FETCH_ASSOC);



if (isset($_POST['submit'])) {
    $new_src = strip_tags($_POST['src']);
    $new_title = strip_tags($_POST['title']);
    $new_description = strip_tags($_POST['description']);
    $new_author = strip_tags($_POST['author']);

    try {
        $sql = $db->prepare("UPDATE picture SET src=?, title=?, description=? WHERE id = ?");

        $sql->execute(array($new_src, $new_title, $new_description, $id));

        
    } catch (Exception $e) {
        $sqlError = $e->getMessage();
    }

    try {
        $sql = $db->prepare("UPDATE picture SET updated_at=? WHERE id =?");
    
        $sql->execute(array(date('Y-m-d H:i:s'),$id));
    } catch (Exception $e) {
        $sqlError = $e->getMessage();
    }
    header("Location: index.php?page=adminlist");
exit;
}


// --- on charge la vue
include "./views/layout.phtml";