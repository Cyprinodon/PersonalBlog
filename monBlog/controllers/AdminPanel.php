<?php
namespace controllers;
use controllers\AdminPanel;

class AdminPanel {
/* Page display related functions
************************************************************/
  Private function displayArticles() {
    $articleManager = new \models\Article();
    $articles = $articleManager->getAllWithAuthor();

    return $articles;
  }

  Private function displayComments() {
    $commentManager = new \models\Comment();
    $comments = $commentManager->getAll();

    return $comments;
  }

  Private function displayModerators() {
    $moderatorManager = new \models\Moderator();
    $moderators = $moderatorManager->getAll();

    return $moderators;
  }

  public function displayAllContent() {
    $articles = $this->displayArticles();
    $comments = $this->displayComments();
    $moderators = $this->displayModerators();

    require(VIEW_PATH."adminPanelView.php");
  }

  public function displayEditionPage() {
    $articleManager = new \models\Article();
    $article = $articleManager->getById( $_GET['id'] );
    require(VIEW_PATH."editionView.php");
  }

  public function displayPublicationPage() {
    require(VIEW_PATH."publicationView.php");
  }

  public function displayNewModeratorPage() {
    require(VIEW_PATH."newModeratorView.php");
  }

  public function displayEditModeratorPage() {
    $moderatorManager = new \models\Moderator();
    $moderator = $moderatorManager->getById( $_GET['id'] );
    require( VIEW_PATH."editModeratorView.php" );
  }

/* Article related functions
************************************************************/
  public function addNewArticle() {
    $articleManager = new \models\Article();
    $articleManager->AddNew( 
      $_POST['article-title'], 
      $_POST['article-excerpt'], 
      $_POST['article-content'], 
      $_SESSION['ID'] );
    header( "Location: index.php?page=admin-panel" );
  }

  public function editArticle() {
    $articleManager = new \models\Article();
    $articleManager->edit( 
      $_GET['id'], 
      $_POST['edit-article-title'], 
      $_POST['edit-article-excerpt'], 
      $_POST['edit-article-content'], 
      $_SESSION['ID'] );
    header( "Location: index.php?page=admin-panel" );
  }

  public function deleteArticle() {
    $articleManager = new \models\Article();
    $articleManager->delete( $_GET['id'] );
    header( "Location: index.php?page=admin-panel" );
  }

/* Comment related functions
************************************************************/
  public function changeCommentStatus( $Status ) {
    $commentManager = new \models\Comment();
    $commentManager->changeStatus( $_GET['id'], $Status );
    header( "Location: index.php?page=admin-panel" );
  }

  public function deleteComment() {
    $commentManager = new \models\Comment();
    $commentManager->delete( $_GET['id'] );
    header( "Location: index.php?page=admin-panel" );
  }

/* Moderator related functions
************************************************************/
  public function addNewModerator() {
    $moderatorManager = new \models\Moderator();
    $moderatorManager->AddNew(
      $_POST['moderator-firstname'],
      $_POST['moderator-lastname'],
      $_POST['moderator-password'] );
    header( "Location: index.php?page=admin-panel" );
  }

  public function editModerator() {
    $moderatorManager = new \models\Moderator();
    if( isset( $_POST['change-moderator-password'] ) AND $_POST['change-moderator-password'] == "on" ) {
      if( empty( $_POST['edit-moderator-password'] ) == true ) {
        $_POST['alert'] = "Le champ mot de passe ne doit pas être vide !";
        require( VIEW_PATH."editModeratorView.php" );
      }
      else {
        $moderatorManager->editPassword( $_GET['id'], $_POST['edit-moderator-password'] );
      }
    }
    $moderatorManager->edit($_GET['id'], $_POST['edit-moderator-firstname'], $_POST['edit-moderator-lastname'] );
    header("Location: index.php?page=admin-panel");
  }

  public function deleteModerator() {
    $moderatorManager = new \models\Moderator();
    $moderatorManager->delete( $_GET['id'] );
    header( "Location: index.php?page=admin-panel" );
  }
}


