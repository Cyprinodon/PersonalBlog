<?php
namespace models;
/*require_once(\MODEL_PATH."Model.php");*/

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
    $moderator = $request->fetch( \PDO::FETCH_ASSOC );
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
    $moderator = $request->fetch( \PDO::FETCH_ASSOC );
    return $moderator;
  }

  public function addNew( $firstName, $lastName, $password ) {
    $hashedPassword = password_hash( $password, PASSWORD_DEFAULT);

    $database = $this->connectToDatabase();
    $sqlString = 
      "INSERT INTO moderator(login, first_name, last_name, password, signup_timestamp)
      VALUES( ?, ?, ?, ?, NOW())";
    $request = $database->prepare( $sqlString );
    $request->execute( array( $firstName.$lastName, $firstName, $lastName, $hashedPassword ) );
  }

  public function edit( $moderatorId, $firstName, $lastName ) {
    $login = $firstName.$lastName;
    $database = $this->connectToDatabase();
    $sqlString = 
      "UPDATE moderator SET login = ?, first_name = ?, last_name = ? WHERE ID = ?";
    $request = $database->prepare( $sqlString );
    $request->execute( array( $login, $firstName, $lastName, $moderatorId ) );
  }

  public function editPassword( $moderatorId, $password ) {
    $hashedPassword = password_hash( $password, PASSWORD_DEFAULT);
    $database = $this->connectToDatabase();
    $sqlString = 
      "UPDATE moderator SET password = ? WHERE ID = ?";
    $request = $database->prepare( $sqlString );
    try{$request->execute( array($hashedPassword, $moderatorId ) );}
    catch(exception $e) {
      var_dump($e);
    }

    return;
  }

  public function delete( $moderatorId ) {
    $database = $this->connectToDatabase();
    $sqlString = "DELETE FROM moderator WHERE ID = ?";
    $request = $database->prepare( $sqlString );
    $request->execute( array( $moderatorId ) );
  }
}
