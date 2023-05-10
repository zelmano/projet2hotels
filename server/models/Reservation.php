<?php
//
// Codé par Julia
//

class Reservation
{
    //Fonction qui renvoie les reservations faites par zelman
    static function getReservations($admin)
    {
        $db = Db::connectionDB();

        $idHotel = Hotel::adminHotel($admin);

        $string = 'SELECT * FROM reservation
                    INNER JOIN chambre c on c.id_chambre = reservation.id_chambre
                    WHERE id_hotel = :hotel;';
        $query = $db->prepare($string);
        $query->bindParam(":hotel", $idHotel);
        $query->execute();
        return $query->fetchAll(); //PDO::FETCH_ASSOC
    }
}

?>
