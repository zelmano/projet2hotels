<?php
//
// Codé par Julia
//

require_once('../models/Db.php');
require_once('../models/reservation_m.php');
require_once('../models/Chambre.php');


class Recherche
{
    //
    // Effectue les recherches selon certains critères
    //
    static function getRecherche($hotel, $debut, $fin, $denomination)
    {
        // les dates par defauts
        $datedebut = '2020-01-01';
        $datefin = '2080-12-30';

        $db = Db::connectionDB();

        $request = "SELECT r.date_debut, r.date_fin, h.nom, c2.denomination FROM chambre as c
                    LEFT JOIN reservation r on c.id_chambre = r.id_chambre
                    AND (r.date_fin > :datefin AND r.date_debut > :datedebut)
                    INNER JOIN hotel h on h.id_hotel = c.id_hotel                        
                    INNER JOIN categorie c2 on c.id_categorie = c2.id_categorie";
        if ($hotel != 'none' || $fin != 'none' || $debut != 'none' || $denomination != 'none') { //tu peux utiliser la fonction empty() ou isset()
            $request .= " WHERE ";
            if ($hotel != 'none') {
                $request .= "h.id_hotel = :hotel AND ";
            }
            if ($debut != 'none') {
                $request .= "r.date_debut = :debut AND ";
            }
            if ($fin != 'none') {
                $request .= "r.date_fin = :fin AND ";
            }
            if ($denomination != 'none') {
                $request .= "c2.id_categorie = :denomination AND ";
            }
            //$request = substr($request, 0, -5);
            $request .= "r.id_sejour IS NULL";
            $stmt = $db->prepare($request);
            if ($hotel != 'none') {
                $stmt->bindParam(':hotel', $hotel);
            }
            if ($debut != 'none') {
                $stmt->bindParam(':debut', $debut);
                $stmt->bindParam(':datedebut', $debut);
            }
            else {
                $stmt->bindParam(':datedebut', $datedebut);
            }
            if ($fin != 'none') {
                $stmt->bindParam(':fin', $fin);
                $stmt->bindParam(':datefin', $fin);
            }
            else{
                $stmt->bindParam(':datefin', $datefin);
            }
            if ($denomination != 'none') {
                $stmt->bindParam(':denomination', $denomination);
            }
        }
        else {
            $request .= "r.id_sejour IS NULL";
            $stmt = $db->prepare($request);
            $stmt->bindParam(':datedebut', $datedebut);
            $stmt->bindParam(':datefin', $datefin);

        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}

//Permet de faire des tests

/*
$hotel = '1';
$fin = 'none';
$debut = 'none';
$denomination = '1';
*/

//print_r(Recherche::getRecherche($hotel, $debut, $fin, $denomination));


?>