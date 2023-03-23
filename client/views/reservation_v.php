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
        <td><?php echo $reservation['reservation_id']; ?></td>
        <td><?php echo $reservation['customer_id']; ?></td>
        <td><?php echo $reservation['room_id']; ?></td>
        <td><?php echo $reservation['check_in']; ?></td>
        <td><?php echo $reservation['check_out']; ?></td>
        <td><?php echo $reservation['price']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>