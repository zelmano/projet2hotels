<?php
//
// Codé par Julia
//

class authentification{
    //
    // Authentification Admin
    //
    static function authent($email, $mdp)
    {
        $db = Db::connectionDB();
        $request = 'SELECT id_admin FROM admin WHERE email = :email AND motdepasse = crypt(:mdp, motdepasse)';
        $stmt = $db->prepare($request);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mdp', $mdp);
        $stmt->execute();
        $resultat = $stmt->fetch();
        return $resultat;
    }
}

?>
