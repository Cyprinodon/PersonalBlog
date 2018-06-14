<?php ?>
<?php ob_start(); ?>
<h2>Liste des articles</h2>

<?php foreach( $articles as $article )
{ ?>
  <article>
    <h3><?php echo $article["title"]; ?></h3>
    <p><?php echo $article["timestamp_fr"]; ?></p>
    <?php echo $article["excerpt"]; ?>
    <a href="index.php?page=article&id=<?php echo $article["ID"]; ?>">Lire la suite...</a>
  </article>
<?php
} ?>
<?php $content = ob_get_clean(); ?>
<?php require( VIEW_PATH."baseTemplateView.php" ); ?>