<?php
const ROOT_PATH = __DIR__.DIRECTORY_SEPARATOR;
const VIEW_PATH = ROOT_PATH."views/";
const MODEL_PATH = ROOT_PATH."models/";
const CONTROLLER_PATH = ROOT_PATH."controllers/";

require('Autoloader.php');
spl_autoload_register( array( 'Autoloader', 'loadAll' ) );

/*require( Constant\CONTROLLER_PATH."Home.php" );
require_once( Constant\CONTROLLER_PATH."Login.php" );
require_once( Constant\CONTROLLER_PATH."Contact.php" );*/

if( isset( $_GET['loginattempt'] ) AND $_GET['loginattempt'] == true ) {
  $loginManager = new controllers\Login;
  $loginManager->checkInputs();
}
if( isset( $_GET['logoutattempt'] ) AND $_GET['logoutattempt'] == true ) {
  $loginManager->logout();
}

if( isset( $_GET['page'] ) )
{
  $page = $_GET['page'];

  switch($page)
  {
    case "home" :
      $homePage = new controllers\Home;
      $homePage->listAllArticles();
      break;
    case "article" :
      if( isset( $_GET['id'] ) AND $_GET['id'] > 0 ) {
        $articlePage = new controllers\Home;
        $articlePage->displayDetailedArticle();
      }
      else {
        echo "Error: 'id' missing in query string.";
      }
      break;
    case "contact" :
      $contactPage = new controllers\Contact;
      $contactPage->displayView();
      break;
    case "adminPanel" :
      $adminPanelPage = new controllers\AdminPanel;
      $adminPanelPage->displayAllContent();
  }
}
else{
  $_GET['page'] = "home";
  $homePage = new controllers\Home;
  $homePage->listAllArticles();
}
