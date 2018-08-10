<?php
require_once(__DIR__."/../constants.php");
require_once(MODEL_PATH."Article.php");
require_once(MODEL_PATH."Comment.php");
require_once(MODEL_PATH."Moderator.php");

function listAllArticles {
  $articleManager = new Article();
  $articles = $articleManager->getAll();
  require(VIEW_PATH."adminView.php");
}

function displayComments {

}

function displayAdministrators {

}