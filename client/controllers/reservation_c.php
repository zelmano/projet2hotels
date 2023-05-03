<?php
require_once('../models/reservation_m.php');

$reservations = Reservation::getReservations();
$hotels=Reservation::getHotels();//zel
$categories=Reservation::getCategories();//zel

require_once('../views/reservation_v.php');

?>