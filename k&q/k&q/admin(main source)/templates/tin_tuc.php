<!-- Add Button -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Tin Tức</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="tin_tuc_code.php" method="POST" enctype=multipart/form-data>
        <div class="modal-body">
          <div class="form-group">
            <label>Tựa Đề </label>
            <input type="text" name="tua_de" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Hình Ảnh </label>
            <input type="file" name="image" id="anh" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Nội Dung</label>
            <textarea class="form-control" id="editor1" name="tin_tuc" rows="4" cols="50" required></textarea>
          </div>
          <div class="form-group">
            <label>URL</label>
            <input type="text" name="url" class="form-control">
          </div>
          <div class="form-group">
            <label>Tên URL</label>
            <input type="text" name="ten_url" class="form-control">
          </div>
          <div class="form-group">
            <label>Ngày Đăng</label>
            <input type="text" name="ngay_dang" readonly class="form-control" value="<?php echo date("d-m-Y"); ?>" required>
          </div>
          <input class="form-control" hidden readonly name="ma_nhan_vien" value=" <?php echo $data_user['id'] ?>">
        </div>
        <div class="modal-footer">
          <button type="submit" name="add_tt" class="btn btn-primary">Lưu</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Quản Lý Tin Tức</h1>
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
      <button type="button" id="add_button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
        Thêm Tin Tức
      </button></br>
      <form action="<?php echo $_DOMAIN . 'tintuc' ?>" method="post">
        <div class="">
          <div id="dataTable_filter" class="dataTables_filter">
            <label for="search">Tìm kiếm
              <input type="text" name="search" id="search_text" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
            </label>&nbsp;
            <label>Chức Vụ</label>
            <select style="border-radius: 5px; border-style:ridge" name="chucvu">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT * FROM chuc_vu WHERE id_cv not in (6,4) ";
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
            <label>Ngày</label>
            <select style="border-radius: 5px; border-style:ridge" name="ngay">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT DISTINCT NgayDang FROM `tin_tuc` where 20";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
              ?>
                  <option value="<?php echo "NgayDang='" . $row['NgayDang'] . "'"; ?>">
                    <?php echo $row['NgayDang']; ?></option>
              <?php
                }
              }
              ?>
            </select>&nbsp;
            <label>Tình Trạng</label>
            <select style="border-radius: 5px; border-style:ridge" name="status">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT distinct TrangThai FROM tin_tuc";
              $serial_number = 0;
              foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                if ($db->num_rows($sql)) {
                  if ($row['TrangThai'] == 1) {
                    $trangthai = '✔';
                  } else {
                    $trangthai = '❌';
                  }
                  echo '
                                <option value="TrangThai=' . $row['TrangThai'] . ' " > ' . $trangthai . '  </option>
                                        ';
                }
              }
              ?>
            </select>&nbsp;
            <label><i class="fa fa-sort"></i></label>
            <select style="border-radius: 5px; border-style:ridge" name="tt">
              <option value="ORDER By id_tt ASC">Cũ Nhất</option>
              <option value="ORDER By id_tt DESC">Mới Nhất</option>
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
              <th>Tựa Đề </th>
              <th>Ngày Đăng</th>
              <th>Nhân Viên Đăng</th>
              <th>Trạng Thái</th>
              <th> </th>
              <th> </th>
              <th> </th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['submit'])) {
              $a = $_POST['chucvu'];
              $search = $_POST['search'];
              $tt = $_POST['tt'];
              $ngay = $_POST['ngay'];
              $status=$_POST['status'];
              $sql = "SELECT * FROM `tin_tuc` JOIN register on register.id=tin_tuc.id_nv 
            where ($a and $ngay and $status and TuaDe like '%$search%') 
            or ($a and $ngay and $status and register.username like '%$search%') $tt";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
            ?>
                  <tr>
                    <th><?php echo $serial_number; ?> </th>
                    <th><?php echo $row['TuaDe']; ?></th>
                    <td> <?php echo $row['NgayDang']; ?></td>
                    <td> <?php echo $row['username']; ?></td>
                    <td>
                      <?php
                      if ($row['TrangThai'] == 1) {
                        echo '✔';
                      } else {
                        echo '❌';
                      }
                      ?></td>
                    <td>
                      <form action="<?php echo '' . $_DOMAIN . 'tintuc_edit_img'; ?>" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id_tt']; ?>">
                        <button type="submit" name="edit_img" class="btn btn-warning"> Sửa Ảnh</button>
                      </form>
                    </td>
                    <td>
                      <form action="<?php echo '' . $_DOMAIN . 'tintuc_edit'; ?>" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id_tt']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-success"> Sửa</button>
                      </form>
                    </td>
                    <td>
                      <form action="tin_tuc_code.php" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id_tt']; ?>">
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
              $sql = "SELECT * FROM `tin_tuc` JOIN register on register.id=tin_tuc.id_nv";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;

                ?>
                  <tr>
                    <th><?php echo $serial_number; ?> </th>
                    <th><?php echo $row['TuaDe']; ?></th>
                    <td> <?php echo $row['NgayDang']; ?></td>
                    <td> <?php echo $row['username']; ?></td>
                    <td>
                      <?php
                      if ($row['TrangThai'] == 1) {
                        echo '✔';
                      } else {
                        echo '❌';
                      }
                      ?></td>
                    <td>
                      <form action="<?php echo '' . $_DOMAIN . 'tintuc_edit_img'; ?>" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id_tt']; ?>">
                        <button type="submit" name="edit_img" class="btn btn-warning"> Sửa Ảnh</button>
                      </form>
                    </td>
                    <td>
                      <form action="<?php echo '' . $_DOMAIN . 'tintuc_edit'; ?>" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id_tt']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-success"> Xem</button>
                      </form>
                    </td>
                    <td>
                      <form action="tin_tuc_code.php" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id_tt']; ?>">
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
          url: 'tin_tuc_code.php',
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
  <script>
    CKEDITOR.replace('editor1');
  </script>