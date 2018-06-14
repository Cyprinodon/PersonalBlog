<?php
require_once( MODEL_PATH."articleModel.php" );
require_once( MODEL_PATH."commentModel.php" );

function listAllArticles()
{
  $articleManager = new Article();
  $articles = $articleManager->getAll();

  require( VIEW_PATH."homeView.php" );
}

function displayDetailedArticle()
{
  $articleManager = new Article();
  $commentManager = new Comment();

  $currentArticleId = $_GET["id"];
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

  $article = $articleManager->getById( $_GET["id"] );
  $comments = $commentManager->getAllByArticleId( $_GET["id"] );

  require( VIEW_PATH."articleView.php" );
}

function addComment( $articleId, $author, $content )
{
  $commentManager = new Comment();
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