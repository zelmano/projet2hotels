<?php

require_once('../models/Recherche.php');

$recherche = Recherche::getRecherche(1, "none", "none", 2);

var_dump($recherche);

require_once('../views/reservation_v.php');

?>
