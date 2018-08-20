<?php
/*namespace monblog;
use monblog\constant;
use monblog\controller;*/
require_once( __DIR__."/constants.php");
require_once( CONTROLLER_PATH."homeController.php" );
require_once( CONTROLLER_PATH."loginController.php" );
require_once( CONTROLLER_PATH."contactController.php" );

if( isset( $_GET['loginattempt'] ) AND $_GET['loginattempt'] == true ) {
  checkLoginInputs();
}
if( isset( $_GET['logoutattempt'] ) AND $_GET['logoutattempt'] == true ) {
  logout();
}

if( isset( $_GET['page'] ) )
{
  $page = $_GET['page'];

  switch($page)
  {
    case "home" :
      listAllArticles();
      break;
    case "article" :
      if( isset( $_GET['id'] ) AND $_GET['id'] > 0 ) {
        displayDetailedArticle();
      }
      else {
        echo "Error: 'id' missing in query string.";
      }
      break;
    case "contact" :
      displayContactPage();
      break;
  }
}
else{
  $_GET['page'] = "home";
  listAllArticles();
}
