<?php
require 'db.php';
$room_id = $_GET['room_id'];
$sql = 'DELETE FROM meterdata WHERE room_id=:room_id';
$statement = $connection->prepare($sql);
if ($statement->execute([':room_id' => $room_id])) {
  header("Location: index.php");
}