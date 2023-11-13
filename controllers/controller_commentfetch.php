

<?php 
require_once("./models/Comment.php");
$comments = comment::getAllComment($picture['id'])[0]; ?>

<?php foreach ($comments as $comment) : ?>
    <div class="commentaires" id="commentaires<?= $picture['id'] ?>">
      <div class="comContent">
        <img src="<?= $comment['user_photo']; ?>" alt="" class="userPhotoCom">
        <div class="idcom">
          <div class="cadreCom">
            <p class="userComment"><?= $comment['user_pseudo']; ?></p>
            <p class="textComment"><?= $comment['com']; ?></p>
          </div>
          <div class="optionCom">
            <p class="dateComment"><?= $comment['date_com']; ?></p>
            <?php if (isset($_SESSION['id']) && (int)$_SESSION['id'] === (int)$comment['id_user']) { ?>
              <form method="POST" id="form_delete">
                <input type="hidden" name="comment_id" value="<?= $comment['comment_id'];; ?>">
                <input type="submit" name="supprimer" value="Supprimer" class="supprCom">
              </form>
            <?php }; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>