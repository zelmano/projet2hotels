<?php
//
// Codé par Julia
//


class Conso{
    //
    // Renvoie la liste des consos et leurs prix en fonction d'un hotel
    // (donc en fonction d'un gérant)
    //
    static function consos ($admin){
        $db = Db::connectionDB();

        $idHotel = Hotel::adminHotel($admin);

        $request = "SELECT denomination, pc.prix, c.id_conso from hotel
                    INNER JOIN prix_conso pc on hotel.id_hotel = pc.id_hotel
                    INNER JOIN conso c on c.id_conso = pc.id_conso
                    WHERE hotel.id_hotel = :hotel;";
        $stmt = $db->prepare($request);
        $stmt->bindParam(':hotel', $idHotel);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //
    // Permet au gerant de son hotel de modifier les prix de ses consommation
    //
    static function prixConsos  ($admin, $prix, $idConso){
        $db = Db::connectionDB();

        $idHotel = Hotel::adminHotel($admin);

        $request = "UPDATE prix_conso
                    SET prix = :prix
                    WHERE id_hotel = :hotel
                    AND id_conso = :conso";
        $stmt = $db->prepare($request);
        $stmt->bindParam(':hotel', $idHotel);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':conso', $idConso);
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //
    // Permet au gérant d'un hotel d'ajouter une conso a une reservation
    //
    static function ajoutConsos ($idConso, $date, $idSejour, $nombre){
        $db = Db::connectionDB();

        $request = "INSERT INTO conso_client (id_conso, id_sejour, date_conso, nombre)
                    VALUES (:idconso, :idsejour, :dateconso, :nombre)";
        $stmt = $db->prepare($request);
        $stmt->bindParam(':idconso', $idConso);
        $stmt->bindParam(':dateconso', $date);
        $stmt->bindParam(':idsejour', $idSejour);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
