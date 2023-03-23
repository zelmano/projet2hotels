<?php
require_once('../models/Reservation.php');
$reservations=Reservation::getReservations();
require_once('../views/reservation_v.php');
?>