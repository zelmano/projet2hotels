<?php
//
// Codé par Julia
//



class Chambre{
    //
    // Renvoie toutes les chambres d'un hotel en particulier
    // (donc du gerant de l'hotel)
    //
    static function allChambre($admin){
        $db = Db::connectionDB();

        $request = "SELECT numero_chambre as numero, c2.denomination, c.id_chambre as categorie FROM admin
                    INNER JOIN chambre c on admin.id_hotel = c.id_hotel
                    INNER JOIN categorie c2 on c2.id_categorie = c.id_categorie
                    WHERE id_admin = :admin";
        $stmt = $db->prepare($request);
        $stmt->bindParam(':admin', $admin);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //
    //  Renvoie pour une chambre les dates ou elle est reservée
    //
    static function disponible($idchambre){
        $db = Db::connectionDB();

        $request ="SELECT r.date_debut, r.date_fin, c2.denomination FROM chambre as c
                    LEFT JOIN reservation r on c.id_chambre = r.id_chambre
                    INNER JOIN hotel h on h.id_hotel = c.id_hotel
                    INNER JOIN categorie c2 on c.id_categorie = c2.id_categorie
                    WHERE c.id_chambre = :idchambre";
        $stmt = $db->prepare($request);
        $stmt->bindParam(':idchambre', $idchambre);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //
    // Permet au superAdmin de modifier les prix
    // faire un if dans le controller id_admin == 0
    //
    static function modifPrixChambre($idclasse,$idcategorie){
        $db = Db::connectionDB();

        $request = "UPDATE prix_chambre
                    SET prix = :prix
                    WHERE id_classe = :classe
                    AND id_categorie = :categorie";
        $stmt = $db->prepare($request);
        $stmt->bindParam(':classe', $idclasse);
        $stmt->bindParam(':categorie', $idcategorie);
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
