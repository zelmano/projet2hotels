
<html>
<head>
    <meta charset="utf-8">
    <title>Reservations</title>
    <link rel="stylesheet" href="../scripts/style.css">
</head>
<body>

<nav>
    <div id="nav_header">
        <img src="../sources/hotel.svg" alt="logo">
        <h1>Les Hotels</h1>
    </div>
    <div id="nav_user">
        <h1 id="nav_username">$nom_client</h1>
        <img src="../sources/profile.svg" alt="profile">
    </div>
    <div id="nav_tabs">
        <div class="nav_tab">
            <img src="../sources/home.svg" alt="accueil">
            <a href="accueil.html">Accueil</a>
        </div>
        <div class="nav_tab">
            <img src="../sources/plane.svg" alt="avion">
            <a href="reservation_c.php">Réserver</a>
        </div>
        <div class="nav_tab">
            <img src="../sources/list.svg" alt="list">
            <a href="sejours_c.php">Mes Séjours</a>
        </div>
    </div>
</nav>

<main>

    <form action="" method="post">
        <div class="form_selector">
            <label for="identifiant">Identifiant</label>
            <input type="text" name="identifiant" id="identifiant" required>
        </div>
        <div class="form_selector">
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp" required>
        </div>
        <input type="submit" value="Connexion">
    </form>

</main>
</body>
</html>