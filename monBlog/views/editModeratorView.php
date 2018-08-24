<?php ob_start(); ?>
<h2>Éditer le profil de <?php echo $moderator['first_name']." ".$moderator['last_name'] ?></h2>
<form class="container" action="index.php?page=admin-panel&action=send-edited-moderator&id=<?php echo $_GET['id'] ?>" method="post">
    <fieldset>
      <legend>Formulaire d'édition</legend>
      <div class="row">
        <div>
          <label for="edit-moderator-firstname">Prénom :</label>
          <input type="text" class="u-full-width" name="edit-moderator-firstname" value="<?php echo $moderator['first_name'] ?>">
        </div>
        <div class="row">
          <label for="edit-moderator-lastname">Nom :</label>
           <input type="text" class="u-full-width" name="edit-moderator-lastname" value="<?php echo $moderator['last_name'] ?>">
        </div>
      </div>
      <div class="row">
        <label for="change-password">Changer le mot de passe ?</label>
        <input type="checkbox" name="change-moderator-password">
        <input type="text" class="u-full-width" name="edit-moderator-password" placeholder="Votre éventuel nouveau mot de passe...">
      </div>
      <div class="row">
        <input type="submit" class="button-primary u-full-width" name="edit-moderator-submit" value="Éditer">
      </div>
    </fieldset>
  </form>
<?php $content = ob_get_clean(); ?>
<?php require( \VIEW_PATH."baseTemplateView.php" ); ?>
