<?php ?>
<?php ob_start(); ?>
<article>
  <h2><?php echo $article["title"]; ?></h3>
  <p><?php echo $article["timestamp_fr"]; ?></p>
  <?php echo $article["content"]; ?>
  <a href="index.php?page=article&id=<?php echo $previousId ?>">Article précédent</a>
  <a href="index.php?page=home">Index</a>
  <a href="index.php?page=article&id=<?php echo $nextId ?>">Article suivant</a>
</article>
<section>
  <h3>Commentaires</h3>
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
