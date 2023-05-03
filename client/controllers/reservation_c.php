<?php

require_once('../models/Reservation.php');

$reservations = Reservation::getReservations();
$hotels= Reservation::getHotels();//z

require_once('../views/reservation_v.php');

?>