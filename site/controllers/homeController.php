<?php
namespace DimGrab\MonBlog\Controller;
use \DimGrab\MonBlog\Constant;
use \DimGrab\MonBlog\Model;
require_once( Constant\MODEL_PATH."Article.php" );
require_once( Constant\MODEL_PATH."Comment.php" );

function listAllArticles()
{
  $articleManager = new Model\Article();
  $articles = $articleManager->getAll();

  require( Constant\VIEW_PATH."homeView.php" );
}

function displayDetailedArticle()
{
  $articleManager = new Model\Article();
  $commentManager = new Model\Comment();

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

  for( $index = 0; $index < sizeof($comments); $index++ )
  {
    if( $comments[$index]["status"] != "Validé" )
    {
      array_splice($comments, $index);
    }
  }

  require( Constant\VIEW_PATH."articleView.php" );
}

function addComment( $articleId, $author, $content )
{
  $commentManager = new Model\Comment();
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
