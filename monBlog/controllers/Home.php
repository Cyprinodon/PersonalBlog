<?php
namespace controllers;

/*require_once( \MODEL_PATH."Article.php" );
require_once( \MODEL_PATH."Comment.php" );*/

class Home {
  public function listAllArticles()
  {
    $articleManager = new \models\Article();
    $articles = $articleManager->getAll();

    require( \VIEW_PATH."homeView.php" );
  }

  public function displayDetailedArticle()
  {
    $articleManager = new  \models\Article();
    $commentManager = new  \models\Comment();

    $currentArticleId = $_GET['id'];
    $maxId = $articleManager->getCount();
    $nextId = strval($currentArticleId+1);
    $previousId = strval($currentArticleId-1);
    if( $currentArticleId >= $maxId )
    {
      $nextId = strval(1);
    }
    if( $currentArticleId <= 1 )
    {
      $previousId = $maxId;
    }

    $article = $articleManager->getById( $_GET['id'] );
    $comments = $commentManager->getAllByArticleId( $_GET['id'] );

    for( $index = 0; $index < sizeof($comments); $index++ )
    {
      if( $comments[$index]["status"] != "Validé" )
      {
        array_splice($comments, $index);
      }
    }

    require( VIEW_PATH."articleView.php" );
  }

  public function addComment( $articleId, $author, $content )
  {
    $commentManager = new  \models\Comment();
    $affectedLines = $commentManager->addNew( $articleId, $author, $content );

    if( $affectedLines === false )
    {
      throw new Exception( "Comment can't be added." );
    }
    else
    {
      header( "Location: index.php?page=article&id=".$articleId );
    }
  }

  public function displayWarningPage( $message ) {
    $_POST["message"] = $message;
    require( VIEW_PATH."warningView.php" );
  }
}


