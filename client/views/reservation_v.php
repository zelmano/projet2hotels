<html>
<head>
  <meta charset="utf-8">
  <title>Reservations</title>
  <link rel="stylesheet" href="/client/scripts/style.css">
</head>
<body>

  <nav>
    <div id="nav_header">
      <img src="../sources/hotel.svg" alt="logo">
      <h1>Les Hotels</h1>
    </div>
    <div id="nav_user">
      <h1 id="nav_username">$nom_client</h1> <!-- $nom_client -->
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

    <h2>Recherche</h2>

    <!-- <p>Vous pouvez rechercher une chambre en fonction de l'hotel, du type de chambre et des dates de début et de fin.</p>
    <p>Si vous ne renseignez pas de date, la recherche se fera sur toutes les dates.</p>
    <p>Si vous ne renseignez pas de type de chambre, la recherche se fera sur tous les types de chambre.</p>
    <p>Si vous ne renseignez pas d'hotel, la recherche se fera sur tous les hotels.</p>
    <p>Si vous ne renseignez pas de date de début, la recherche se fera sur toutes les dates de début.</p>
    <p>Si vous ne renseignez pas de date de fin, la recherche se fera sur toutes les dates de fin.</p> -->

    <form action="" method="post">

      <!--séléction de l'hotel-->
      <div class="form_selector">
        <label for="hotel">Hotel</label>
        <select name="hotel" id="hotel">
          <?php
          //on récupère la liste des hotels et on les parcourt pour créer les différentes options de recherche
          for ($i=0;$i<count($hotels);$i++){
            echo '<option value="'.$hotels[$i]['nom'].'">'.$hotels[$i]['nom'].'</option>';
          }
          ?>
        </select>
      </div>

      <!--séléction de la catégorie de chambre-->
      <div class="form_selector">
        <label for="categorie">Catégorie</label>
        <select name="categorie" id="categorie">
          <?php
          //on récupère la liste des dénominations des categories de chambre et on les parcourt pour créer les différentes options de recherche
          for ($i=0;$i<count($categories);$i++){
            echo '<option value="'.$categories[$i]['denomination'].'">'.$categories[$i]['denomination'].'</option>';
          }
          ?>
        </select>
      </div>

      <!-- séléction de la date de début et de fin -->
      <div class="form_selector">
        <label for="datedebut">Date de début</label>
        <input type="date" name="datedebut" id="datedebut">
      </div>

      <div class="form_selector">
        <label for="datefin">Date de fin</label>
        <input type="date" name="datefin" id="datefin">
      </div>

      <input type="submit" value="Rechercher">
    </form>


    <div class="cards">

      <?php
      //on parcourt la liste des chambres disponibles et on les affiche
      for ($i=0;$i<count($chambres);$i++){
        echo '<div class="room_card">';
        echo '<h2>'.$chambres[$i]['nom'].'</h2>';
        echo '<table>';
        echo '<tr>';
        echo '<th>catégorie</th>';
        echo '<th>type</th>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>'.$chambres[$i]['denomination'].'</td>';
        echo '<td>'.$chambres[$i]['type'].'</td>';
        echo '</tr>';
        echo '</table>';
        echo '<button class="btn">Reserver</button>';
        echo '</div>';
      }
      ?>

    </div>

  </main>


  <!-- <div>
    <div class="room_card">
      <h2>Hotel 1</h2>
      <table>
        <tr>
          <th>catégorie</th>
          <th>type</th>
        </tr>
        <tr>
          <td>A</td>
          <td>chambre simple</td>
        </tr>
      </table>
      <button class="btn">Reserver</button>
    </div>

    <div class="room_card">
      <h2>Hotel 2</h2>
      <table>
        <tr>
          <th>catégorie</th>
          <th>type</th>
        </tr>
        <tr>
          <td>A</td>
          <td>chambre simple</td>
        </tr>
      </table>
      <button class="btn">Reserver</button>
    </div>

    <div class="room_card">
      <h2>Hotel 3</h2>
      <table>
        <tr>
          <th>catégorie</th>
          <th>type</th>
        </tr>
        <tr>
          <td>A</td>
          <td>chambre simple</td>
        </tr>
      </table>
      <button class="btn">Reserver</button>
    </div>
  </div> -->
</body>
</html>