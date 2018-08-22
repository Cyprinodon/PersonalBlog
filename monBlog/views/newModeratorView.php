<?php ob_start(); ?>
<h2>Ajouter un modérateur</h2>
<form class="container" action="index.php?page=admin-panel&action=send-moderator" method="post">
    <fieldset>
      <legend>Formulaire d'ajout</legend>
      <div class="row">
        <div>
          <label for="moderator-firstname">Prénom :</label>
          <input type="text" class="u-full-width" name="moderator-firstname">
        </div>
        <div class="row">
          <label for="moderator-lastname">Nom :</label>
          <input type="text" class="u-full-width" name="moderator-lastname">
        </div>
      </div>
      <div class="row">
        <label for="moderator-password">Mot de passe :</label>
        <input type="text" class="u-full-width" name="moderator-password">
      </div>
      <div class="row">
        <input type="submit" class="button-primary u-full-width" name="moderator-submit" value="Ajouter">
      </div>
    </fieldset>
  </form>
<?php $content = ob_get_clean(); ?>
<?php require( \VIEW_PATH."baseTemplateView.php" ); ?>