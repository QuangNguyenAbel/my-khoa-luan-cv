<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Danh sách học sinh</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a class="btn btn-info" href="<?php echo '' . $_DOMAIN . 'lophoc_gv'; ?>">Quay Lại</a>
    </div>
    <div class="table-responsive">
      <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT </th>
              <th>Mã Học Sinh</th>
              <th>Tên Học Sinh</th>
              <th>Điểm</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['ma_lop_id'])) {
              $id_lop = $_POST['id'];
              $sql = "SELECT  * FROM hoc_sinh Where id_lop='$id_lop'";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
                  echo '
						 <tr>
                  <td> ' . $serial_number . '</td>
                  <td> HS-' . $row['id'] . '</td>
                  <td> ' . $row['TenHocSinh'] . '</td>
                  <td> ' . $row['Diem'] . '</td>
                </tr>
						';
                }
              }
            }
            ?>
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
          </tbody>
        </table>
      </div>
    </div>
  </div>