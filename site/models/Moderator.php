<?php
namespace DimGrab\MonBlog\Model;
require_once(\DimGrab\MonBlog\Constant\MODEL_PATH."Model.php");

class Moderator extends Model
{
  public function getById( $moderatorId )
  {
    $database = $this->connectToDatabase();

    $sqlString = 
      "SELECT
        ID,
        login,
        first_name,
        last_name,
        password,
        DATE_FORMAT(signup_timestamp, 'le %d/%m/%Y à %H:%i:%s') AS timestamp_fr
      FROM moderator
      WHERE ID = ?
      ORDER BY signup_timestamp DESC";

    $request = $database->prepare( $sqlString );
    $request->execute( array( $moderatorId ) );
    $moderator = $request->fetch( PDO::FETCH_ASSOC );
    return $moderator;
  }

  public function getAll()
  {
    $database = $this->connectToDatabase();
    $sqlString = 
      "SELECT
        ID,
        login,
        first_name,
        last_name,
        password,
        DATE_FORMAT(signup_timestamp, 'le %d/%m/%Y à %H:%i:%s') AS timestamp_fr
      FROM moderator
      ORDER BY signup_timestamp DESC";

    $moderators = $database->query( $sqlString );
    return $moderators;
  }

  public function getByLogin( $moderatorLogin )
  {
    $database = $this->connectToDatabase();
    $sqlString = 
      "SELECT
        ID,
        login,
        first_name,
        last_name,
        password,
        DATE_FORMAT(signup_timestamp, 'le %d/%m/%Y à %H:%i:%s') AS timestamp_fr
      FROM moderator
      WHERE login = ?";

    $request = $database->prepare( $sqlString );
    $request->execute( array( $moderatorLogin ) );
    $moderator = $request->fetch( PDO::FETCH_ASSOC );
    return $moderator;
  }
}
