<?php
require_once('../models/reservation_m.php');

$reservations = Reservation::getReservations();
$hotels=Reservation::getHotels();//zel
$categories=Reservation::getCategories();//zel

//ce qu'il faut encore
//$nom_client : à récupérer après la connexion

//$chambres qui contient les chambres disponibles pour le séjour sélectionné
//$chambres est un tableau qui s'organise comme ça :
// $chambres = array(
  //     array('id chambre', 'hotel', 'categorie', 'prix'),
  //     array('id chambre', 'hotel', 'categorie', 'prix'),
  //     array('id chambre', 'hotel', 'categorie', 'prix'),
  // etc...

//pour info, voilà les id du formulaire à aller cherche dans $_POST :
//hotel
//denomination
//datedebut
//datefin

require_once('../views/reservation_v.php');

?>