<!DOCTYPE html>
<html id="squeleton-style" lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Dimitri Grabette - Blog</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="wrapper">
    <?php require( VIEW_PATH."partials/headerPartial.php" ) ?>
    <main>
      <?php echo $content ?>
    </main>
    <?php require( VIEW_PATH."partials/footerPartial.php" ) ?>
  </div>
</body>
</html>