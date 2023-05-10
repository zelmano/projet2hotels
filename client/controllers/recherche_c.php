<?php

require_once('../models/Recherche.php');

//if verifier si les get sont vides mes normalement ils le sont jamais (je suis pas sur)
    // faire un get si on appuie sur le bouton rechercher (donne lui un nom logique mdr)
        // alors on recupere ce qu'il a rentré dans les cases (4 critères en tout)
        // on l'attribut dans des valeurs
        // on appelle get recherche avec ces valeurs
        // on recupere le tableau et on fait une boucle for avec un echo pour afficher sous forme de tableau les recherches

//important quand on charge la page de base (et que on a pas appuié sur le bouton recherche en gros)
// alors tu rajouteras un if dans le code plus haut et tous les attributs vaudrons none

$recherche = Recherche::getRecherche(1, "none", "none", 2);

var_dump($recherche);

require_once('../views/reservation_v.php');

?>
