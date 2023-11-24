<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Ca Học</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="ca_hoc_code.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="ten_chuc_vu">Tên Ca Học</label>
            <input type="text" name="ten_ca" class="form-control" placeholder=""  required>
          </div>
          <div class="form-group">
            <label for="ten_chuc_vu">Chi Tiết Ca Học</label>
            <input type="text" name="ct_ca" class="form-control" placeholder=""  required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="add_cv" class="btn btn-primary">Lưu</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Quản Lý Ca Học</h1>
  <!-- DataTales Example -->
  
  <div class="card shadow mb-4">
  <?php
  if ($data_user['usertype'] == 2) {
    echo '<div class="card-header py-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
      Thêm Ca Học
    </button>
  </div>';
  }
  ?>
    
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
              <th>Tên Ca Học </th>
              <th>Chi Tiết Ca Học</th>
              <?php
              if ($data_user['usertype'] == 2) {
                echo '<th>Sửa </th>
                <th>Xóa </th>';
              }
              ?>

            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "select * from ca_hoc ";
            if ($db->num_rows($sql)) {
              $serial_number = 0;
              foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                $serial_number++;
                echo '
                <tr>
                  <td> ' . $serial_number . '</td>
                  <td> ' . $row['ten_ca'] . '</td>
                  <td> ' . $row['chitiet_ca'] . '</td>';
                if ($data_user['usertype'] == 2) {
                  echo '<td>
                    <form action="' . $_DOMAIN . 'ca_hoc_edit" method="POST">
                      <input type="hidden" name="edit_id" value="' . $row['id_ca'] . '">
                      <button type="submit" name="edit_cv" class="btn btn-success"> Sửa </button>
                    </form>
                  </td>
                  <td>
                    <form action="ca_hoc_code.php" method="POST">
                      <input type="hidden" name="delete_id" value="' . $row['id_ca'] . '">
                      <button type="submit" name="delete_cv" class="btn btn-danger"> Xóa</button>
                    </form>
                  </td>';
                }
                echo '</tr>';
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>