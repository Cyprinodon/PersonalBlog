<?php
namespace DimGrab\MonBlog\Controller;
use \DimGrab\MonBlog\Constant;
use \DimGrab\MonBlog\Model;

require_once(__DIR__."/../constants.php");
require_once(Constant\MODEL_PATH."Article.php");
require_once(Constant\MODEL_PATH."Comment.php");
require_once(Constant\MODEL_PATH."Moderator.php");

function listAllArticles {
  $articleManager = new Model\Article();
  $articles = $articleManager->getAll();
  require(Constant\VIEW_PATH."adminView.php");
}

function displayComments {

}

function displayAdministrators {

}