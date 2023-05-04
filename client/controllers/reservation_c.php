<?php
require_once('../models/reservation_m.php');

$reservations = Reservation::getReservations();
$hotels=Reservation::getHotels();//zel
$categories=Reservation::getCategories();//zel

//ce qu'il faut encore
//$nom_client : à récupérer après la connexion

require_once('../views/reservation_v.php');

?>