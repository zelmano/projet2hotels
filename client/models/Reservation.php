<?php
require_once('../models/Db.php');

class Reservation{
  static function getReservations(){
    $db=Db::connectionDB();
    $string='SELECT * FROM reservation';
    $query=$db->prepare($string);
    $query->execute();
    return $query->fetchAll();//PDO::FETCH_ASSOC
  }
}
?>