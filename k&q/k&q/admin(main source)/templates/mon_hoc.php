<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Môn Học</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="mon_hoc_code.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="ten_bm">Tên Môn Học</label>
            <input type="text" name="ten_mon" class="form-control" placeholder="" required>
          </div>
          <?php
          $sql = "SELECT * FROM bo_mon ";
          if ($db->num_rows($sql)) {
            echo '<div class="form-group">
              <label> Bộ Môn  </label>
              <select name="id_bm" class="form-control ">';
            foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
          ?>
              <option value="<?php echo $row['id_bo_mon'] ?> "> <?php echo $row['ten_bomon'] ?> </option>
            <?php
            }
            ?>
            </select>
        </div>
      <?php
          } else {
            echo "No Data Available";
          }
      ?>
      <div class="form-group">
        <label for="ten_bm">Học Phí</label>
        <input type="number" name="hoc_phi" class="form-control" placeholder="" required>
      </div>
      <div class="form-group">
        <label for="ten_bm">Số Buổi</label>
        <input type="number" name="so_buoi" class="form-control" placeholder="" required>
      </div>
      <div class="form-group">
        <label>Giới Thiệu</label>
        <textarea class="form-control" id="editor1" name="gt_mh" rows="4" cols="50" required></textarea>
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
  <h1 class="h3 mb-2 text-gray-800">Môn Học</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-12">
      <?php
      if ($data_user['usertype'] == 2) {
        echo '
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
    Thêm Môn Học
    </button></br></br>
  ';
      }
      ?>

      <form action="<?php echo $_DOMAIN . 'monhoc' ?>" method="post">
        <div class="">
          <div id="dataTable_filter" class="dataTables_filter">
            <label for="search">Tìm kiếm
              <input type="text" name="search" id="search_text" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
            </label>&nbsp;
            <label>Môn Học</label>
            <select style="border-radius: 5px; border-style:ridge" name="bomon">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT * FROM bo_mon ";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  echo '
                                <option value="type=' . $row['id_bo_mon'] . ' " > ' . $row['ten_bomon'] . '  </option>
                                        ';
                }
              }
              ?>
            </select>&nbsp;
            <label>Số Buổi</label>
            <select style="border-radius: 5px; border-style:ridge" name="so_buoi">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT distinct so_buoi FROM mon_hoc ";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  echo '
                                <option value="so_buoi=' . $row['so_buoi'] . ' " > ' . $row['so_buoi'] . '  </option>
                                        ';
                }
              }
              ?>
            </select>&nbsp;
            <label>Học Phí</label>
            <select style="border-radius: 5px; border-style:ridge" name="hocphi">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT distinct hocphi FROM mon_hoc ";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  echo '
                                <option value="hocphi=' . $row['hocphi'] . ' " > ' . number_format($row['hocphi']) . '  </option>
                                        ';
                }
              }
              ?>
            </select>&nbsp;
            <label><i class="fa fa-sort"></i></label>
            <select style="border-radius: 5px; border-style:ridge" name="tt">
              <option value="ORDER By id_mon ASC">Tăng Dần</option>
              <option value="ORDER By id_mon DESC">Giảm Dần</option>
            </select>
            <button type="submit" name="submit" class="btn btn-success"> Lọc </button>
          </div>
        </div>
      </form>
      <div>
      </div>
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
              <th>Tên Môn Học</th>
              <th>Bộ Môn</th>
              <th>Học Phí</th>
              <th>Số Buổi</th>
              <th>Xem</th>
              <th>Xóa</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['submit'])) {
              $a = $_POST['bomon'];
              $so_buoi = $_POST['so_buoi'];
              $search = $_POST['search'];
              $tt = $_POST['tt'];
              $hocphi = $_POST['hocphi'];
              $sql = "SELECT * FROM `mon_hoc` JOIN bo_mon ON mon_hoc.type=bo_mon.id_bo_mon
               where $a and $hocphi and $so_buoi and ten_monhoc like '%$search%' $tt";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
                  echo '
                <tr>
                <td> ' . $serial_number . '</td>
                <td> ' . $row['ten_monhoc'] . '</td>
                <td> ' . $row['ten_bomon'] . '</td>
                <td> ' . number_format($row['hocphi']) . '</td>
                <td> ' . $row['so_buoi'] . ' </td>
                <td>
                  <form action="' . $_DOMAIN . 'monhoc_edit" method="POST">
                  <input type="hidden" name="ten_bomon" value="' . $row['ten_bomon'] . '">
                    <input type="hidden" name="edit_id" value="' . $row['id_mon'] . '">
                    <button type="submit" name="edit_cv" class="btn btn-success"> Xem </button>
                  </form>
                </td>
                <td>
                  <form action="bo_mon_code.php" method="POST">
                    <input type="hidden" name="delete_id" value="' . $row['id_mon'] . '">
                    <button type="submit" name="delete_cv" class="btn btn-danger"> Xóa</button>
                  </form>
                </td>
                </tr>
		';
                }
              }
              else {
                echo '<b>Không tìm thấy dữ liệu</b>';
              }
            } else {
              $sql = "SELECT * FROM `mon_hoc` JOIN bo_mon ON mon_hoc.type=bo_mon.id_bo_mon";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
                  echo '
                <tr>
                  <td> ' . $serial_number . '</td>
                  <td> ' . $row['ten_monhoc'] . '</td>
                  <td> ' . $row['ten_bomon'] . '</td>
                  <td> ' . number_format($row['hocphi']) . '</td>
                  <td >' . $row['so_buoi'] . ' </td>
                  <td>
                    <form action="' . $_DOMAIN . 'monhoc_edit" method="POST">
                    <input type="hidden" name="ten_bomon" value="' . $row['ten_bomon'] . '">
                      <input type="hidden" name="edit_id" value="' . $row['id_mon'] . '">
                      <button type="submit" name="edit_cv" class="btn btn-success"> Xem </button>
                    </form>
                  </td>
                  <td>
                    <form action="mon_hoc_code.php" method="POST">
                      <input type="hidden" name="delete_id" value="' . $row['id_mon'] . '">
                      <button type="submit" name="delete_cv" class="btn btn-danger"> Xóa</button>
                    </form>
                  </td>
                </tr>
		';
                }
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script>
    CKEDITOR.replace('editor1');
  </script>