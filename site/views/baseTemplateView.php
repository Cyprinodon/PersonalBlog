<!DOCTYPE html>
<html id="squeleton-style" lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Dimitri Grabette - Blog</title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="container">
    <?php require( \DimGrab\MonBlog\Constant\VIEW_PATH."partials/headerPartial.php" ) ?>
    <main>
      <?php echo $content ?>
    </main>
    <?php require( \DimGrab\MonBlog\Constant\VIEW_PATH."partials/footerPartial.php" ) ?>
  </div>
</body>
</html>
