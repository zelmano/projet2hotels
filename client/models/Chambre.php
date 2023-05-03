<?php
require_once('../models/Db.php');
require_once('../models/reservation_m.php');
require_once('../models/Recherche.php');


// Contient les fonctions concernant les chambres
class Chambre {
    // Renvoie la catégorie, l'hôtel et la classe d'une chambre
    static function getInfos($id){

        $db = Db::connectionDB();

        $request = "SELECT c.id_chambre, c2.id_classe, c3.id_categorie FROM chambre c
                    INNER JOIN hotel h on h.id_hotel = c.id_hotel
                    INNER JOIN classe c2 on c2.id_classe = h.id_classe
                    INNER JOIN categorie c3 on c3.id_categorie = c.id_categorie
                    WHERE c.id_chambre = :idchambre;";
        $stmt = $db->prepare($request);
        $stmt->bindParam(':idchambre', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Renvoie le prix d'une chambre selon sa classe et sa categorie
    static function getPrix($id){

        $db = Db::connectionDB();

        $request = "SELECT prix FROM prix_chambre
                    WHERE id_categorie = :categorie
                    AND id_classe = :classe";
        $stmt = $db->prepare($request);

        $chambre = self::getInfos($id);

        $stmt->bindParam(':categorie', $chambre[0]['id_categorie']);
        $stmt->bindParam(':classe', $chambre[0]['id_classe']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>