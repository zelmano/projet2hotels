<html>
<head>
  <meta charset="utf-8">
  <title>Reservations</title>
  <link rel="stylesheet" href="/client/scripts/style.csss">
</head>
<body>

  <!-- faire le formulaire en POST pour qu'il soit récupéré par le controlleur (paradigme MVC)-->
  <h1>Rechercher une chambre</h1>
  <h2>Recherche</h2>
  <p>Vous pouvez rechercher une chambre en fonction de l'hotel, du type de chambre et des dates de début et de fin.</p>
  <p>Si vous ne renseignez pas de date, la recherche se fera sur toutes les dates.</p>
  <p>Si vous ne renseignez pas de type de chambre, la recherche se fera sur tous les types de chambre.</p>
  <p>Si vous ne renseignez pas d'hotel, la recherche se fera sur tous les hotels.</p>
  <p>Si vous ne renseignez pas de date de début, la recherche se fera sur toutes les dates de début.</p>
  <p>Si vous ne renseignez pas de date de fin, la recherche se fera sur toutes les dates de fin.</p>

  <h2>Formulaire</h2>

  <form action="" method="post">

    <!--séléction de l'hotel-->
    <label for="hotel">Hotel</label>
    <select name="hotel" id="hotel">
      <?php
      //on récupère la liste des hotels et on les parcourt pour créer les différentes options
      for ($i=0;$i<count($hotels);$i++){
        echo '<option value="'.$hotels[$i]['id_hotel'].'">'.$hotels[$i]['nom'].'</option>';
      }
      ?>
    </select>

    <label for="type">Type de chambre</label>
    <select name="type" id="type">
      <option value="simple">Simple</option>
      <option value="double">Double</option>
      <option value="double_saledebain">Double avec salle de bain</option>
    </select>

    <label for="datedebut">Date de début</label>
    <input type="date" name="datedebut" id="datedebut">

    <label for="datefin">Date de fin</label>
    <input type="date" name="datefin" id="datefin">

    <input type="submit" value="Rechercher">
  </form>




  <div>
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
  </div>
</body>
</html>