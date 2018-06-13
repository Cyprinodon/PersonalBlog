<?php
//Database constants --> Temporary !!!
const HOST_NAME = "localhost";
const DATABASE_NAME = "personal_blog";
const CHARSET = "utf8";
const LOGIN = "root";
const PASSWORD = "";
const ROOT_PATH = __DIR__.DIRECTORY_SEPARATOR;

require_once( ROOT_PATH."controllers/articleController.php" );

if( isset( $_GET["page"] ) )
{
  if( $_GET["page"] == "home" )
  {
    listAllArticles();
  }
  elseif( $_GET["page"] == "article" )
  {
    if( isset($_GET['id']) AND $_GET['id'] > 0 )
    {
      displayDetailledArticle();
    }
    else
    {
      echo "Error: 'id' missing in query string.";
    }
  }
}
else{
  listAllArticles();
}


