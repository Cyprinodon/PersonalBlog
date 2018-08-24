<?php
namespace controllers;

class Contact {
  public function displayView() {
    require( \VIEW_PATH."contactView.php" );
  }

  public function sendMail() {
    $siteMailbox = "ines.xistante@gmail.com";
    try {
      mail( $siteMailbox, $_POST['contact-topic'], $_POST['contact-message'], "From: ".$_POST['contact-mail'] );
    }
    catch(exception $e) {
      var_dump( $e );
    }
    $this->displayView();
  }
}

