<?php

class Autoloader {
  protected static $paths = array(
    "root" => __DIR__."/",
    "model" => __DIR__."/models/",
    "controller" => __DIR__."/controllers/",
    "view" => __DIR__."/views/"
  );

  public static function loadAll( $className ) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $fileName = $className.".php";
    foreach( self::$paths as $path ) {
      if ( is_file( $path.$fileName ) ) {
        require $path.$fileName;
        return;
      }
    }
  }
}
