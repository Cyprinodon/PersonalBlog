<?php
class Article
{
  public function getById( $articleId )
  {
    $database = $this->connectToDatabase();
    $sqlString = 
      "SELECT
        ID,
        title,
        excerpt,
        content,
        DATE_FORMAT(last_edit_timestamp, 'le %d/%m/%Y à %H:%i:%s') AS timestamp_fr
      FROM article
      WHERE ID = ?
      ORDER BY last_edit_timestamp DESC";

    $request = $database->prepare( $sqlString );
    $request->execute( array( $articleId ) );
    $article = $request->fetch( PDO::FETCH_ASSOC );
    return $article;
  }

  public function getAll()
  {
    $database = $this->connectToDatabase();
    $sqlString = 
      "SELECT
        ID,
        title,
        excerpt,
        content,
        DATE_FORMAT(last_edit_timestamp, 'le %d/%m/%Y à %H:%i:%s') AS timestamp_fr
      FROM article
      ORDER BY last_edit_timestamp DESC";

    $request = $database->query( $sqlString );
    $articles = $request->fetchAll( PDO::FETCH_ASSOC );
    return $articles;
  }

  public function getCount()
  {
    $database = $this->connectToDatabase();
    $sqlString =
      "SELECT
        COUNT(ID) AS max_id
      FROM article";
    $request = $database->query( $sqlString );
    $count = $request->fetch( PDO::FETCH_ASSOC );
    return $count["max_id"];
  }

  private function connectToDatabase()
  {
    try
    {
      $database = new PDO("mysql:host=localhost;dbname=personal_blog;charset=utf8", "root", "");
    }
    catch( Exception $error )
    {
      die( "Error:".$error->getMessage() );
    }
    return $database;
  }
}
