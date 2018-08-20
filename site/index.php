<?php
namespace DimGrab\MonBlog;
use \DimGrab\MonBlog\Constant;
use \DimGrab\MonBlog\Controller;
require_once( __DIR__."/constants.php");
require_once( Constant\CONTROLLER_PATH."homeController.php" );
require_once( Constant\CONTROLLER_PATH."loginController.php" );
require_once( Constant\CONTROLLER_PATH."contactController.php" );

if( isset( $_GET['loginattempt'] ) AND $_GET['loginattempt'] == true ) {
  Controller\checkLoginInputs();
}
if( isset( $_GET['logoutattempt'] ) AND $_GET['logoutattempt'] == true ) {
  Controller\logout();
}

if( isset( $_GET['page'] ) )
{
  $page = $_GET['page'];

  switch($page)
  {
    case "home" :
      Controller\listAllArticles();
      break;
    case "article" :
      if( isset( $_GET['id'] ) AND $_GET['id'] > 0 ) {
        Controller\displayDetailedArticle();
      }
      else {
        echo "Error: 'id' missing in query string.";
      }
      break;
    case "contact" :
      Controller\displayContactPage();
      break;
  }
}
else{
  $_GET['page'] = "home";
  Controller\listAllArticles();
}
