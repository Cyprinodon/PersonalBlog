<?php
namespace models;
/*require_once(\MODEL_PATH."Model.php");*/

class Article extends Model
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
    $article = $request->fetch( \PDO::FETCH_ASSOC );
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
    $articles = $request->fetchAll( \PDO::FETCH_ASSOC );
    return $articles;
  }

  public function getAllWithAuthor()
  {
    $database = $this->connectToDatabase();
    $sqlString =
      "SELECT
        article.ID,
        title,
        excerpt,
        content,
        DATE_FORMAT(last_edit_timestamp, 'le %d/%m/%Y à %H:%i:%s') AS timestamp_fr,
        CONCAT(first_name, ' ', last_name) AS author
      FROM article
      INNER JOIN moderator ON moderator.ID = article.moderator_id";

      $request = $database->query( $sqlString );
      $articles = $request->fetchAll( \PDO::FETCH_ASSOC );
      return $articles;
  }

  public function getCountFromAuthor( $AuthorId )
  {
    $database = $this->connectToDatabase();
    $sqlString =
      "SELECT
        COUNT(ID) AS max_id
      FROM article";
    $request = $database->query( $sqlString );
    $count = $request->fetch( \PDO::FETCH_ASSOC );
    return $count["max_id"];
  }

  public function getCount()
  {
    $database = $this->connectToDatabase();
    $sqlString =
      "SELECT
        COUNT(ID) AS max_id
      FROM article";
    $request = $database->query( $sqlString );
    $count = $request->fetch( \PDO::FETCH_ASSOC );
    return $count["max_id"];
  }

  public function addNew( $title, $excerpt, $content, $authorId )
  {
    $database = $this->connectToDatabase();
    $sqlString =
      "INSERT INTO article(title, excerpt, content, last_edit_timestamp, moderator_id)
      VALUES(?, ?, ?, NOW(), ?)";
    $request = $database->prepare( $sqlString );
    $request->execute( array( $title, $excerpt, $content, $authorId ) );
  }

  public function edit( $articleId, $title, $excerpt, $content, $authorId ) 
  {
    $database = $this->connectToDatabase();
    $sqlString = 
      "UPDATE article 
      SET title = ?, excerpt = ?, content = ?, last_edit_timestamp = NOW(), moderator_id = ?
      WHERE ID = ?";
    $request = $database->prepare( $sqlString );
    $request->execute( array( $title, $excerpt, $content, $authorId, $articleId ) );
  }

  public function delete( $articleId )
  {
    $database = $this->connectToDatabase();
    $sqlString = "DELETE FROM article WHERE ID = ?";
    $request = $database->prepare( $sqlString );
    $request->execute( array( $articleId ) );
  }
}
