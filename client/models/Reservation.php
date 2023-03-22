<?php
require_once('models/Db.php');

class Reservation{
  static function getReservations(){
    $db=Db::connectionDB();
    $query=$db->prepare('SELECT * FROM reservation');
    $query->execute();
    return $query->fetchAll();//PDO::FETCH_ASSOC
  }
}
?>