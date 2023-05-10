<?php

require_once ("../models/authentification.php");

function verifAuthent()
{
    if(!empty($_SESSION["id_client"])) {
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];

        $admin = authentification::authent($email, $pwd); // appel de la fonction

        if (!empty($resulltat['id_client'])){
            $_SESSION["id_client"] = $admin["id_client"];
            echo "Connexion réussi !";
        }
        else{
            echo "Erreur de connexion";
        }
    }
}

verifAuthent();

require_once("../views/authentification_v.php");

?>