<?php
namespace controllers;
use controllers\AdminPanel;

class AdminPanel {
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

  private function areAllSet( array $arguments) {
    foreach($arguments as $argument) {
      if( isset( $argument ) == false ) {
        return false;
      }
    }
    return true;
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

  public function deleteArticle() {
    $articleManager = new \models\Article();
    $articleManager->delete( $_GET['id'] );
  }

  public function editArticle() {
    $articleManager = new \models\Article();
    $articleManager->edit( 
      $_GET['id'], 
      $_POST['edit-article-title'], 
      $_POST['edit-article-excerpt'], 
      $_POST['edit-article-content'], 
      $_SESSION['ID'] );
  }

  public function addNewArticle() {
    $articleManager = new \models\Article();
    $articleManager->AddNew( 
      $_POST['article-title'], 
      $_POST['article-excerpt'], 
      $_POST['article-content'], 
      $_SESSION['ID'] );

  }

  public function addNewModerator() {
    $moderatorManager = new \models\Moderator();
    $moderatorManager->AddNew(
      $_POST['moderator-firstname'],
      $_POST['moderator-lastname'],
      $_POST['moderator-password'] );
  }

  public function editModerator() {

  }

  public function deleteModerator() {

  }
}


