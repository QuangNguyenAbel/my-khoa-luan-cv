<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Lĩnh Vực</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="linh_vuc_code.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="ten_bm">Tên Lĩnh Vực</label>
            <input type="text" name="ten_lv" class="form-control" placeholder="" required>
          </div>
      <div class="form-group">
        <label>Giới Thiệu</label>
        <textarea class="form-control" id="editor1" name="gt_lv" rows="4" cols="50" required></textarea>
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
  <h1 class="h3 mb-2 text-gray-800">Lĩnh Vực</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-12">
      <?php
      if ($data_user['usertype'] == 2) {
        echo '
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
    Thêm Lĩnh Vực
    </button></br></br>
  ';
      }
      ?>

      <form action="<?php echo $_DOMAIN . 'linhvuc' ?>" method="post">
        <div class="">
          <div id="dataTable_filter" class="dataTables_filter">
            <label for="search">Tìm kiếm
              <input type="text" name="search" id="search_text" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
            </label>&nbsp;
            <label><i class="fa fa-sort"></i></label>
            <select style="border-radius: 5px; border-style:ridge" name="tt">
              <option value="ORDER By id_lv ASC">Tăng Dần</option>
              <option value="ORDER By id_lv DESC">Giảm Dần</option>
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
              <th>Tên Lĩnh Vực</th>
              <th>Giới Thiệu</th>
              <th>Xem</th>
              <th>Xóa</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['submit'])) {
              $search = $_POST['search'];
              $tt = $_POST['tt'];
              $sql = "SELECT * FROM `linh_vuc` 
               where ten_lv like '%$search%' $tt";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
                  echo '
                <tr>
                <td> ' . $serial_number . '</td>
                <td> ' . $row['ten_lv'] . '</td>
                <td ><span style="display: -webkit-box;
                  -webkit-line-clamp: 3;
                  -webkit-box-orient: vertical;
                  overflow: hidden;">' . $row['gioithieu_lv'] . '</span> </td>
                  <td>
                  <form action="' . $_DOMAIN . 'linhvuc_edit" method="POST">
                    <input type="hidden" name="edit_id" value="' . $row['id_lv'] . '">
                    <button type="submit" name="edit_cv" class="btn btn-success"> Xem </button>
                  </form>
                </td>
                <td>
                  <form action="linh_vuc_code.php" method="POST">
                    <input type="hidden" name="delete_id" value="' . $row['id_lv'] . '">
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
              $sql = "SELECT * FROM `linh_vuc` order by id_lv desc";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
                  echo '
                <tr>
                <td> ' . $serial_number . '</td>
                <td> ' . $row['ten_lv'] . '</td>
                <td ><span style="display: -webkit-box;
                  -webkit-line-clamp: 3;
                  -webkit-box-orient: vertical;
                  overflow: hidden;">' . $row['gioithieu_lv'] . '</span> </td>
                  <td>
                  <form action="' . $_DOMAIN . 'linhvuc_edit" method="POST">
                    <input type="hidden" name="edit_id" value="' . $row['id_lv'] . '">
                    <button type="submit" name="edit_cv" class="btn btn-success"> Xem </button>
                  </form>
                </td>
                <td>
                  <form action="linh_vuc_code.php" method="POST">
                    <input type="hidden" name="delete_id" value="' . $row['id_lv'] . '">
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