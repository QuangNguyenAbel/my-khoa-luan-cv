<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Bộ Môn</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="bo_mon_code.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="ten_bm">Tên Bộ Môn</label>
            <input type="text" name="ten_bo_mon" class="form-control" placeholder="" pattern="^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_]+$" required>
          </div>
          <?php
          $sql = "SELECT * FROM linh_vuc ";
          if ($db->num_rows($sql)) {
            echo '<div class="form-group">
              <label> Lĩnh Vực  </label>
              <select name="id_lv" class="form-control ">';
            foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
          ?>
              <option value="<?php echo $row['id_lv'] ?> "> <?php echo $row['ten_lv'] ?> </option>
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
        <label>Giới Thiệu</label>
        <textarea class="form-control" id="editor1" name="gt_bm" rows="4" cols="50" required></textarea>
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
  <h1 class="h3 mb-2 text-gray-800">Bộ Môn</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-12">
      <?php
      if ($data_user['usertype'] == 2) {
        echo '
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
    Thêm Bộ Môn
    </button></br></br>
  ';
      }
      ?>

      <form action="<?php echo $_DOMAIN . 'bo_mon' ?>" method="post">
        <div class="">
          <div id="dataTable_filter" class="dataTables_filter">
            <label for="search">Tìm kiếm
              <input type="text" name="search" id="search_text" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
            </label>&nbsp;
            <label>Lĩnh Vực</label>
            <select style="border-radius: 5px; border-style:ridge" name="linhvuc">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT * FROM linh_vuc ";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  echo '
                                <option value="type_lv=' . $row['id_lv'] . ' " > ' . $row['ten_lv'] . '  </option>
                                        ';
                }
              }
              ?>
            </select>&nbsp;
            <label><i class="fa fa-sort"></i></label>
            <select style="border-radius: 5px; border-style:ridge" name="tt">
              <option value="ORDER By id_bo_mon ASC">Tăng Dần</option>
              <option value="ORDER By id_bo_mon DESC">Giảm Dần</option>
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
              <th>Tên Bộ Môn</th>
              <th>Lĩnh Vực</th>
              <th> </th>
              <th> </th>
              <th> </th>
              <th> </th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['submit'])) {
              $linhvuc = $_POST['linhvuc'];
              $search = $_POST['search'];
              $tt = $_POST['tt'];
              $sql = "select * from bo_mon
              JOIN linh_vuc on linh_vuc.id_lv=bo_mon.type_lv
              where $linhvuc and ten_bomon like '%$search%' $tt";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
                  echo '
                <tr>
                  <td> ' . $serial_number . '</td>
                  <td> ' . $row['ten_bomon'] . '</td>
                  <td> ' . $row['ten_lv'] . '</td>
                  <td>
                    <form action="' . $_DOMAIN . 'bo_mon_xem_gv" method="POST">
                      <input type="hidden" name="edit_id" value="' . $row['id_bo_mon'] . '">
                      <input type="hidden" name="ten_bomon" value="' . $row['ten_bomon'] . '">
                      <button type="submit" name="edit_cv" class="btn btn-primary"> Xem Giảng Viên Dạy </button>
                    </form>
                  </td>
                  <td>
                    <form action="' . $_DOMAIN . 'bo_mon_them_gv" method="POST">
                      <input type="hidden" name="edit_id" value="' . $row['id_bo_mon'] . '">
                      <button type="submit" name="edit_cv" class="btn btn-info"> Thêm Giảng Viên Dạy </button>
                    </form>
                  </td>
                  <td>
                    <form action="' . $_DOMAIN . 'bo_mon_edit" method="POST">
                      <input type="hidden" name="edit_id" value="' . $row['id_bo_mon'] . '">
                      <input type="hidden" name="ten_lv" value="' . $row['ten_lv'] . '">
                      <button type="submit" name="edit_cv" class="btn btn-success"> Xem </button>
                    </form>
                  </td>
                  <td>
                    <form action="bo_mon_code.php" method="POST">
                      <input type="hidden" name="delete_id" value="' . $row['id_bo_mon'] . '">
                      <button type="submit" name="delete_cv" class="btn btn-danger"> Xóa</button>
                    </form>
                  </td>
                </tr>
		';
                }
              }else {
                echo '<b>Không tìm thấy dữ liệu</b>';
              }
            } else {
              $sql = "select * from bo_mon
              JOIN linh_vuc on linh_vuc.id_lv=bo_mon.type_lv";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
                  echo '
                <tr>
                  <td> ' . $serial_number . '</td>
                  <td> ' . $row['ten_bomon'] . '</td>
                  <td> ' . $row['ten_lv'] . '</td>
                  <td>
                    <form action="' . $_DOMAIN . 'bo_mon_xem_gv" method="POST">
                      <input type="hidden" name="edit_id" value="' . $row['id_bo_mon'] . '">
                      <input type="hidden" name="ten_bomon" value="' . $row['ten_bomon'] . '">
                      <button type="submit" name="edit_cv" class="btn btn-primary"> Xem Giảng Viên Dạy </button>
                    </form>
                  </td>
                  <td>
                    <form action="' . $_DOMAIN . 'bo_mon_them_gv" method="POST">
                      <input type="hidden" name="edit_id" value="' . $row['id_bo_mon'] . '">
                      <button type="submit" name="edit_cv" class="btn btn-info"> Thêm Giảng Viên Dạy </button>
                    </form>
                  </td>
                  <td>
                    <form action="' . $_DOMAIN . 'bo_mon_edit" method="POST">
                      <input type="hidden" name="edit_id" value="' . $row['id_bo_mon'] . '">
                      <input type="hidden" name="ten_lv" value="' . $row['ten_lv'] . '">
                      <button type="submit" name="edit_cv" class="btn btn-success"> Xem </button>
                    </form>
                  </td>
                  <td>
                    <form action="bo_mon_code.php" method="POST">
                      <input type="hidden" name="delete_id" value="' . $row['id_bo_mon'] . '">
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