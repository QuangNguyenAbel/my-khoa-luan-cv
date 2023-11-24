<h1 class="h3 mb-2 text-gray-800">Hộp thư góp ý, phản hồi</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <?php
    if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
      echo '
              <div class="alert alert-success">
                ' . $_SESSION['success'] . '
              </div>';
      unset($_SESSION['success']);
    }
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
      echo '
              <div class="alert alert-danger">
                ' . $_SESSION['status'] . '
              </div>';
      unset($_SESSION['status']);
    }
    ?>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>STT </th>
            <th>Họ Tên </th>
            <th>Số Điện Thoại </th>
            <th>Mail </th>
            <th>Nội Dung </th>
            <th>Xóa </th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM phan_hoi";
          if ($db->num_rows($sql)) {
            $serial_number = 0;
            foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
              $serial_number++;
          ?>
              <tr>
                <td> <?php echo $serial_number;  ?></td>
                <td> <?php echo trim(addslashes(htmlspecialchars($row['ho_ten']))); ?></td>
                <td> <?php echo trim(addslashes(htmlspecialchars($row['sdt']))); ?> </td>
                <td> <?php echo trim(addslashes(htmlspecialchars($row['mail']))); ?> </td>
                <td> <?php echo trim(addslashes(htmlspecialchars($row['noidung']))); ?> </td>
                <td>
                  <form action="hopthu_code.php" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="delete_btn" class="btn btn-danger"> Xóa</button>
                  </form>
                </td>
              </tr>
          <?php
            }
          } else {
            echo "No record found";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>