<?php ?>
<?php ob_start(); ?>
<article>
  <h2><?php echo $article["title"]; ?></h3>
  <p><?php echo $article["timestamp_fr"]; ?></p>
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
<?php $content = ob_get_clean(); ?>
<?php require( VIEW_PATH."baseTemplateView.php" ); ?>
