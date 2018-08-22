<?php ob_start(); ?>
<section>
  <h3>Attention</h3>
  <p><?php echo $_POST['message']; ?></p>
  <a class="button button-primary" href="index?page=home">Retourner à l'accueil</a>
</section>
<?php $content = ob_get_clean(); ?>
<?php require( \VIEW_PATH."baseTemplateView.php" ); ?>