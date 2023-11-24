<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Danh sách Lớp Dạy</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
    </div>
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
              <th>Khóa Học</th>
              <th>Mã Lớp </th>
              <th>Giáo Viên </th>
              <th>Tình Trạng </th>
              <th> </th>
              <th> </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $email = $data_user['email'];
            $sql = "SELECT * from register inner join nhan_vien on nhan_vien.id=register.id_nv inner join lop_hoc on lop_hoc.id_gv=nhan_vien.id WHERE register.email = '$email'";
            if ($db->num_rows($sql)) {
              $serial_number = 0;
              foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                $serial_number++;
                echo '<tr>
                  <td> ' . $serial_number . '</td>
                  <td> ' . $row['Khoa'] . '</td>
                  <td> ' . $row['MaLop'] . '</td>
                  <td> ' . $row['MaGV'] . '</td>
                  <td> ' . $row['TinhTrang'] . '</td>
                  <td>
                    <form action="' . $_DOMAIN . 'lophoc_gv_danhsach" method="POST">
                      <input type="hidden" name="id" value="' . $row['id'] . '">
                      <input type="submit" name="ma_lop_id" value="Danh Sách Học Sinh" class="btn btn-primary">
                    </form>
                  </td>
                  <td>
                    <form action="' . $_DOMAIN . 'lichday" method="POST">
                      <input type="hidden" name="id" value="' . $row['id'] . '">
                      <input type="submit" name="xem_lich" value="Lịch Dạy" class="btn btn-info">
                    </form>
                  </td>
                </tr>
           ';
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>