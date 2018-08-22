<?php ob_start(); ?>
<h2>Ajouter un article</h2>
<form class="container" action="index.php?page=admin-panel&action=send-published-article" method="post">
    <fieldset>
      <legend>Formulaire d'édition</legend>
      <div class="row">
        <div class="">
          <label for="edit-title">Titre :</label>
          <input type="text" class="u-full-width" name="article-title">
        </div>
        <div class="row">
          <label for="edit-excerpt">Résumé :</label>
          <textarea class="u-full-width" name="article-excerpt" value=""></textarea>
        </div>
      </div>
      <div class="row">
        <label for="edit-content">Contenu :</label>
        <textarea class="u-full-width large-height" name="article-content"></textarea>
      </div>
      <div class="row">
        <input type="submit" class="button-primary u-full-width" name="article-submit" value="Publier">
      </div>
    </fieldset>
  </form>
<?php $content = ob_get_clean(); ?>
<?php require( \VIEW_PATH."baseTemplateView.php" ); ?>