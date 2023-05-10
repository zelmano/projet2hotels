<?php
//
// Codé par Julia
//

class authentification{
    //
    // Permet de ce connecter (client)
    //
    static function authent($email, $mdp)
    {
        $db = Db::connectionDB();
        $request = 'SELECT id_client FROM client WHERE email = :email AND motdepasse = crypt(:mdp, motdepasse)';
        $stmt = $db->prepare($request);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mdp', $mdp);
        $stmt->execute();
        $resultat = $stmt->fetchAll();
        return $resultat;
    }
}

?>
