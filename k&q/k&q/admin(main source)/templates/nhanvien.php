<!-- Add Button -->

<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Quản Lý Nhân Viên - Giáo Viên</h1>
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
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <form action="<?php echo $_DOMAIN . 'nhanvien' ?>" method="post">
        <div class="">
          <div id="dataTable_filter" class="dataTables_filter">
            <label for="search">Tìm kiếm
              <input type="text" name="search" id="search_text" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
            </label>&nbsp;
            <label>Chức Vụ</label>
            <select style="border-radius: 5px; border-style:ridge" name="chucvu">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT * FROM chuc_vu WHERE id_cv not in (6) ";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  echo '
                                <option value="usertype=' . $row['id_cv'] . ' " > ' . $row['TenChucVu'] . '  </option>
                                        ';
                }
              }
              ?>
            </select>&nbsp;
            <label>Trình Độ</label>
            <select style="border-radius: 5px; border-style:ridge" name="trinh_do">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT * FROM trinh_do WHERE id_trinhdo  ";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  echo '
                                <option value="granduate=' . $row['id_trinhdo'] . ' " > ' . $row['TrinhDo'] . '  </option>
                                        ';
                }
              }
              ?>
            </select>&nbsp;
            <label><i class="fa fa-sort"></i></label>
            <select style="border-radius: 5px; border-style:ridge" name="tt">
              <option value="ORDER By id ASC">Tăng Dần</option>
              <option value="ORDER By id DESC">Giảm Dần</option>
            </select>
            <button type="submit" name="submit" class="btn btn-success"> Lọc </button>
          </div>
        </div>
      </form>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <div class="row">
            <form action="" method="post">
              <div class="col-sm-12 col-md-6">
                <div id="dataTable_filter" class="dataTables_filter">

                </div>
              </div>
            </form>
          </div>
          <thead align="center">
            <tr>
              <th>STT </th>
              <th>Tên Nhân Viên </th>
              <th>Mã Nhân Viên </th>
              <th>Chức Vụ </th>
              <th> </th>
              <th> </th>
              <th> </th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['submit'])) {
              $a = $_POST['chucvu'];
              $trinh_do = $_POST['trinh_do'];
              $search = $_POST['search'];
              $tt = $_POST['tt'];
              $sql = "SELECT * FROM register 
              join trinh_do on trinh_do.id_trinhdo=register.granduate 
              JOIN chuc_vu on chuc_vu.id_cv = register.usertype 
            where usertype NOT IN (6) and (($a and $trinh_do  and username like '%$search%') 
            Or ($a and  $trinh_do and user_code like '%$search%')) $tt";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
            ?>
                  <tr>
                    <td> <?php echo $serial_number; ?></td>
                    <td> <?php echo $row['username']; ?> </td>
                    <td> <?php echo $row['user_code']; ?> </td>
                    <td> <?php echo $row['TenChucVu']; ?> </td>
                    <td>
                      <form action="<?php echo '' . $_DOMAIN . 'nhanvien_tb'; ?>" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-info">Thông Báo</button>
                      </form>
                    </td>
                    <td>
                      <form action="<?php echo '' . $_DOMAIN . 'nhanvien_edit_img'; ?>" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_img" class="btn btn-warning"> Sửa Ảnh</button>
                      </form>
                    </td>
                    <td>
                      <form action="<?php echo '' . $_DOMAIN . 'nhanvien_edit'; ?>" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-success">Xem</button>
                      </form>
                    </td>
                    <td>
                      <form action="nhan_vien_codesa.php" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger"> Xóa</button>
                      </form>
                    </td>
                  </tr>
                <?php
                }
              } else {
                echo '<b>Không tìm thấy dữ liệu</b>';
              }
            } else {
              $sql = "SELECT * FROM register 
              join trinh_do on trinh_do.id_trinhdo=register.granduate 
              JOIN chuc_vu on chuc_vu.id_cv = register.usertype 
              where usertype NOT IN (6)";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;

                ?>
                  <tr>
                    <td> <?php echo $serial_number; ?></td>
                    <td> <?php echo $row['username']; ?> </td>
                    <td> <?php echo $row['user_code']; ?> </td>
                    <td> <?php echo $row['TenChucVu']; ?> </td>
                    <td>
                      <form action="<?php echo '' . $_DOMAIN . 'nhanvien_tb'; ?>" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-info">Thông Báo</button>
                      </form>
                    </td>
                    <td>
                      <form action="<?php echo '' . $_DOMAIN . 'nhanvien_edit_img'; ?>" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_img" class="btn btn-warning"> Sửa Ảnh</button>
                      </form>
                    </td>
                    <td>
                      <form action="<?php echo '' . $_DOMAIN . 'nhanvien_edit'; ?>" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-success">Xem</button>
                      </form>
                    </td>
                    <td>
                      <form action="nhan_vien_codesa.php" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger"> Xóa</button>
                      </form>
                    </td>
                  </tr>
            <?php
                }
              }
            }
            // 
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#search_text').keyup(function() {
        var search = $(this).val();
        $.ajax({
          url: 'nhan_vien_codesa.php',
          method: 'post',
          data: {
            query: search
          },
          success: function(response) {
            $('#dataTable').html(response);
          }
        });
      });
    });
  </script>