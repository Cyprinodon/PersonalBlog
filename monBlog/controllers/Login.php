<?php
namespace controllers;

class Login {
  public function CheckInputs() {
    $userInputLogin = $_POST[ 'login-name' ];
    $userInputPassword = $_POST[ 'login-password' ];

    $moderatorManager = new \models\Moderator();
    $moderator = $moderatorManager->getByLogin( $userInputLogin );

    $isValidPassword = password_verify( $userInputPassword, $moderator['password'] );

    if( isset( $moderator['login'] ) == false OR $isValidPassword == false) {
      $_POST['alert'] = "Identifiant ou mot de passe erroné !";
    }
    else {
      if(isset($_SESSION) == false) {
        session_start();
      }
    $_SESSION['ID'] = $moderator['ID'];
    $_SESSION['login'] = $moderator['login'];
    $_SESSION['user_name'] = $moderator['first_name']." ".$moderator['last_name'];
  }
}

  public function logout() {
    $_SESSION = array();
    session_destroy();
  }
}

