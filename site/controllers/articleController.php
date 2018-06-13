<?php
require_once( ROOT_PATH."models/articleModel.php" );

function listAllArticles()
{
  $articleManager = new Article();
  $articles = $articleManager->getAll();

  require( ROOT_PATH."views/homeView.php" );
}

function displayDetailedArticle()
{
  $articleManager = new Article();
  $commentManager = new Comment();

  $article = $articleManager->getById( $_GET["ID"] );
  $comments = $commentManager->getAllByArticleId( $_GET["ID"] );

  require( ROOT_PATH."views/articleView.php" );
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