<?php
namespace controllers;
use controllers\AdminPanel;

class AdminPanel {
  Private function displayArticles() {
    $articleManager = new \models\Article();
    $articles = $articleManager->getAll();

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
}


