<?php
require 'db.php';
$sql = 'SELECT * FROM meterdata';
$statement = $connection->prepare($sql);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
 <?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h4>ตารางข้อมูลมิเตอร์น้ำ</h4>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>หมายเลขห้อง</th>
          <th>ตัวเลขจากหน้าปัด</th>
          <th>วันที่/เวลา</th>
          <th>ชื่อพนักงาน</th>
          <th>ภาพถ่าย</th>
          <th>แก้ไข/ลบข้อมูล</th>
        </tr>
        <?php foreach($result as $room_data): ?>
          <tr>
            <td><?= $room_data->room_id; ?></td>
            <td><?= $room_data->meter_reading; ?></td>
            <td><?= $room_data->date_time; ?></td>
            <td><?= $room_data->staff; ?></td>
            <td><div class="btn btn-primary">ดู</div></td>
            <td>
              <a href="edit.php?room_id=<?= $room_data->room_id ?>" class="btn btn-info">แก้ไข</a>
              <a onclick="return confirm('ต้องการลบข้อมูลของห้องนี้?')" href="delete.php?room_id=<?= $room_data->room_id ?>" class='btn btn-danger'>ลบ</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>