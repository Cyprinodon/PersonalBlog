<?php ob_start(); ?>
<article>
  <h2><?php echo $article["title"]; ?></h3>
  <p><?php echo $article["timestamp_fr"]; ?></p>
  <h3>Résumé</h3>
  <p><?php echo $article["excerpt"]; ?></p>
  <h3>Article complet</h3>
  <?php echo $article["content"]; ?>
  <a href="index.php?page=article&id=<?php echo $previousId ?>">&lt; Article précédent</a>
  <a href="index.php?page=home">| Index |</a>
  <a href="index.php?page=article&id=<?php echo $nextId ?>">Article suivant &gt;</a>
</article>
<section>
  <h3>Commentaires</h3>
  <?php if( sizeof( $comments ) == 0 ) : ?>
    <em>Il n'y a ancun commentaires de publié pour le moment.</em>
  <?php endif ?>
  <?php foreach( $comments as $comment )
  { ?>
    <article>
      <p><em>De <mark><?php echo $comment["author"] ?></mark> - <?php echo $comment["timestamp_fr"] ?></em></p>
      <p><?php echo $comment["content"] ?></p>
    </article>
  <?php } ?>
</section>
<form action="index.php?page=article&action=add-new-comment&id=<?php echo $article['ID'] ?>" method="post">
  <fieldset>
    <legend>Laisser un commentaire</legend>
    <div clas="input-group">
      <label for="comment-name">Nom :</label>
      <input type="text" name="comment-author" placeholder="Votre nom..." maxlength="50">
      <small>(50 max.)</small>
    </div>
    <div class="input-group">
      <label for="comment-message">Commentaire :</label>
      <textarea type="text" name="comment-content" placeholder="Votre message..." cols="50" rows="10" maxlength="500"></textarea>
      <small>(500 max.)</small>
    </div>
    <div class=input-group>
      <input type="submit" name="contact-submit" value="Envoyer" title="Seuls les commentaires validés par un modérateur seront publiés !">
    </div>
  </fieldset>
</form>
<?php $content = ob_get_clean(); ?>
<?php require( \VIEW_PATH."baseTemplateView.php" ); ?>
