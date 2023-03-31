<html>
<head>
  <title>Reservations</title>
</head>
<body>
  <h1>Reservations</h1>
  <table>
    <tr>
      <th>Reservation ID</th>
      <th>Customer ID</th>
      <th>Room ID</th>
      <th>Check In</th>
      <th>Check Out</th>
      <th>Price</th>
    </tr>
    <?php foreach ($reservations as $reservation): ?>
      <tr>
        <td><?php echo $reservation['nom_client']; ?></td>
        <td><?php echo $reservation['id_chambre']; ?></td>
        <td><?php echo $reservation['date_arrivee']; ?></td>
        <td><?php echo $reservation['date_fin']; ?></td>
        <td><?php echo $reservation['id_sejour']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>