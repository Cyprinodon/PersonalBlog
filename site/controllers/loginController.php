<?php
require_once(__DIR__."/../constants.php");
require_once(MODEL_PATH."Moderator.php");

function CheckLoginInputs() {
  $userInputLogin = $_POST[ 'login-name' ];
  $userInputPassword = $_POST[ 'login-password' ];

  $moderatorManager = new Moderator();
  $moderator = $moderatorManager->getByLogin( $userInputLogin );

  $isValidPassword = password_verify( $userInputPassword, $moderator['password'] );

  if( isset( $moderator['login'] ) == false ) {
    $_POST['alert'] = "Identifiant non reconnu !";
  }
  else {
    if( $isValidPassword ) {
      session_start();
      $_SESSION['ID'] = $moderator['ID'];
      $_SESSION['login'] = $moderator['login'];
      $_SESSION['user_name'] = $moderator['first_name']." ".$moderator['last_name'];
    }
    else {
      $_POST['alert'] = "Mot de passe erroné !";
    }
  }
}

function logout() {
  session_start();
  $_SESSION = array();
  session_destroy();
}

