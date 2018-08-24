<?php ob_start(); ?>
<h2>Éditer un article</h2>
<form class="container" action="index.php?page=admin-panel&action=send-edited-article&id=<?php echo $_GET['id'] ?>" method="post">
    <fieldset>
      <legend>Formulaire d'édition</legend>
      <div class="row">
        <div>
          <label for="edit-title">Titre :</label>
          <input type="text" class="u-full-width" name="edit-article-title" value="<?php echo $article['title'] ?>">
        </div>
        <div class="row">
          <label for="edit-excerpt">Résumé :</label>
          <textarea class="u-full-width" name="edit-article-excerpt"><?php echo $article['excerpt'] ?></textarea>
        </div>
      </div>
      <div class="row">
        <label for="edit-content">Contenu :</label>
        <textarea class="u-full-width large-height" name="edit-article-content"><?php echo $article['content'] ?></textarea>
      </div>
      <div class="row">
        <input type="submit" class="button-primary u-full-width" name="edit-article-submit" value="Éditer">
      </div>
    </fieldset>
  </form>
<?php $content = ob_get_clean(); ?>
<?php require( \VIEW_PATH."baseTemplateView.php" ); ?>
