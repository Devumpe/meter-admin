<?php
require 'db.php';
$room_id = $_GET['room_id'];
$sql = 'SELECT * FROM meterdata WHERE room_id=:room_id';
$statement = $connection->prepare($sql);
$statement->execute([':room_id' => $room_id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['meter_reading'])) {
  $meter_reading = $_POST['meter_reading'];
  $sql = 'UPDATE meterdata SET meter_reading=:meter_reading WHERE room_id=:room_id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':meter_reading' => $meter_reading, ':room_id' => $room_id])) {
    header("Location: index.php");
  }
}
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h4>แก้ไขข้อมูล</h4>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="meter_reading">ตัวเลขจากหน้าปัด</label>
          <input value="<?= $person->meter_reading; ?>" type="text" name="meter_reading" id="meter_reading" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">แก้ไข</button>
        </div>
      </form>
    </div>
  </div>
</div>