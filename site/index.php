<?php
//Database constants --> Temporary !!!
const HOST_NAME = "localhost";
const DATABASE_NAME = "personal_blog";
const CHARSET = "utf8";
const LOGIN = "root";
const PASSWORD = "";
const ROOT_PATH = __DIR__.DIRECTORY_SEPARATOR;
const VIEW_PATH = ROOT_PATH."views/";
const MODEL_PATH = ROOT_PATH."models/";
const CONTROLLER_PATH = ROOT_PATH."controllers/";

require_once( CONTROLLER_PATH."homeController.php" );

if( isset( $_GET["page"] ) )
{
  switch($_GET["page"])
  {
    case "home" :
      listAllArticles();
      break;
    case "article" :
      if( isset($_GET['id']) AND $_GET['id'] > 0 ) {
        displayDetailedArticle();
      }
      else {
        echo "Error: 'id' missing in query string.";
      }
      break;
    case "contact" :
      break;
  }
}
else{
  listAllArticles();
}


