<?php
namespace models;
class Comment extends Model
{
  public function getAllByArticleId( $articleId )
  {
    $database = $this->connectToDatabase();

    $sqlString = 
      "SELECT
        ID,
        author,
        content,
        status,
        DATE_FORMAT(creation_timestamp, 'le %d/%m/%Y à %H:%i:%s') AS timestamp_fr
      FROM comment
      WHERE article_id = ?
      ORDER BY creation_timestamp DESC";

    $request = $database->prepare( $sqlString );
    $request->execute( array( $articleId ) );
    $comments = $request->fetchAll( \PDO::FETCH_ASSOC );
    return $comments;
  }

  public function getAll()
  {
    $database = $this->connectToDatabase();
    $sqlString = 
      "SELECT
        ID,
        author,
        content,
        status,
        DATE_FORMAT(creation_timestamp, 'le %d/%m/%Y à %H:%i:%s') AS timestamp_fr
      FROM comment
      ORDER BY creation_timestamp DESC";

    $request = $database->query( $sqlString );
    $comments = $request->fetchAll();
    return $comments;
  }

  public function getById( $commentId )
  {
    $database = $this->connectToDatabase();

    $sqlString = 
      "SELECT
        ID,
        author,
        content,
        status,
        DATE_FORMAT(creation_timestamp, 'le %d/%m/%Y à %H:%i:%s') AS timestamp_fr
      FROM comment
      WHERE ID = ?
      ORDER BY DESC creation_timestamp";

    $request = $database->prepare( $sqlString );
    $request->execute( array( $commentId ) );
    $comment = $request->fetch( \PDO::FETCH_ASSOC );
    return $comment;
  }

  public function addNew( $articleId, $author, $comment )
  {
    $database = $this->connectToDatabase();

    $comments = $database->prepare( "INSERT INTO comment(article_id, author, content, creation_timestamp, status) VALUES(?, ?, ?, NOW(), 'En attente')" );
    $affectedLines = $comments->execute( array( $articleId, $author, $content ) );
    return $affectedLines;
  }
}
