<?php
require_once('../models/Db.php');
require_once('../models/Recherche.php');
require_once('../models/Chambre.php');


class Reservation{
    //Fonction qui renvoie les reservations faites par zelman
    static function getReservations(){
        $db=Db::connectionDB();
        $string='SELECT * FROM reservation';
        $query=$db->prepare($string);
        $query->execute();
        return $query->fetchAll(); //PDO::FETCH_ASSOC
    }

    // Cette fonction permet (une fois que le client a rempli les infos) de creer une nouvelle reservation
    static function setReservation($id_client, $idchambre, $debut, $fin, $paiement, $nom){
        $db=Db::connectionDB();

        $nbr = self::nbrReservation();
        $sejourid = $nbr[0][0] + 1;
        $request = "INSERT INTO reservation (id_client, id_sejour, id_chambre, date_fin, date_debut, date_arrivee, paiement, nom_client)
                 VALUES (:idclient, :idsejour, :idchambre, :fin, :debut, :arrivee, :paiement, :nom)";
        $stmt = $db->prepare($request);
        $stmt->bindParam(':idclient', $id_client);
        $stmt->bindParam(':idsejour', $sejourid);
        $stmt->bindParam(':idchambre', $idchambre);
        $stmt->bindParam(':fin', $fin);
        $stmt->bindParam(':debut', $debut);
        $stmt->bindParam(':paiement', $paiement);
        $stmt->bindParam(':arrivee', $debut);
        $stmt->bindParam(':nom', $nom);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    // Cette fonction permet de calculer le nombre de réservation total

    static function nbrReservation(){
        $db=Db::connectionDB();
        $string='SELECT count(*) FROM reservation';
        $query=$db->prepare($string);
        $query->execute();
        return $query->fetchAll(); //PDO::FETCH_ASSOC
    }
    // Recupere la listes des consommations appartenant à un sejour donné
    static function getConso($idsejour){
        $db=Db::connectionDB();
        $request = "SELECT cc.nombre, pc.prix, c2.denomination from reservation  r
                    INNER JOIN conso_client cc on r.id_sejour = cc.id_sejour
                    INNER JOIN chambre c on c.id_chambre = r.id_chambre
                    INNER JOIN hotel h on h.id_hotel = c.id_hotel
                    INNER JOIN conso c2 on c2.id_conso = cc.id_conso
                    INNER JOIN prix_conso pc on c2.id_conso = pc.id_conso
                    WHERE r.id_sejour = :idsejour";
        $stmt = $db->prepare($request);
        $stmt->bindParam(':idsejour', $idsejour);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Renvoie le prix total des consommations d'un sejour
    static function getPrixConso($idsejour){
        $tabconso = self::getConso($idsejour);
        $prixTot = 0;
        foreach ($tabconso as $conso){
            $prixTot += $conso['nombre'] * $conso['prix'];
        }
        return $prixTot;
    }
    // Renvoie le prix total du sejour
    static function prixSejour($idsejour){

        $db=Db::connectionDB();

        $request = "SELECT id_chambre FROM reservation
                     WHERE  id_sejour = :idsejour";
        $stmt = $db->prepare($request);
        $stmt->bindParam(':idsejour', $idsejour);
        $stmt->execute();
        $chambre = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $prixCh = Chambre::getPrix($chambre[0]['id_chambre']); // appel fonction
        $prixCo = self::getPrixConso($idsejour); // appel fonction
        /*print_r($prixCh);
        print_r('prix cons');
        print_r($prixCo);
        print_r("...........");*/

        return $prixCh[0]['prix'] + $prixCo;

    }
}

//Reservation::setReservation(2,2,'2022-02-10','2022-02-13',NULL,'test1');
//print_r(Reservation::getConso(22));
//print_r(Reservation::getPrixConso(22));
//print_r("...........test 1");
//print_r(Reservation::prixSejour(22));
//print_r(".........test 2");
//print_r(Reservation::prixSejour(7));

?>