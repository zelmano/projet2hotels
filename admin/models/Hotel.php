<?php
//
// Codé par Julia
//

class Hotel{
    //
    // Retourne l'hotel de l'admin
    //
    static function adminHotel($admin){
        $db = Db::connectionDB();

        $request = "SELECT id_hotel FROM admin
                    WHERE id_admin = :admin";
        $stmt = $db->prepare($request);
        $stmt->bindParam(':admin', $admin);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //
    // Renvoie les hotels (pour le global admin)
    //
    static function hotelListe(){
        $db = Db::connectionDB();

        $request = "SELECT * FROM hotel";
        $stmt = $db->prepare($request);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
