<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Dimitri Grabette - Blog</title>
  <link rel="stylesheet" src="css/style.css">
</head>
<body>
  <?php require( VIEW_PATH."partials/headerPartial.php" ) ?>
  <main>
    <?php echo $content ?>
  </main>
  <?php require( VIEW_PATH."partials/footerPartial.php" ) ?>
</body>
</html>