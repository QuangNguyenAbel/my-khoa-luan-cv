<!-- Add Button -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Tài Liệu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="tai_lieu_code.php" method="POST" enctype=multipart/form-data>
        <div class="modal-body">
          <div class="form-group">
            <label>Tựa Đề </label>
            <input type="text" name="tua_de" class="form-control" required>
          </div>
          <div class="form-group">
            <label> Lớp Học </label>
            <select name="id_lop" class="form-control ">
              <?php
              $id = $data_user['id'];
              if ($data_user['usertype'] == 5) {
                $sql = "SELECT * FROM `lop_hoc` 
                JOIN register on lop_hoc.id_gv=register.id 
                JOIN tai_lieu on lop_hoc.id_lop=tai_lieu.id_lop 
                WHERE lop_hoc.id_gv = '$id' And lop_hoc.trangthailop=4
               ";
              } else {
                $sql = "SELECT * FROM lop_hoc where trangthailop = 4";
              }
              if ($db->num_rows($sql) >= 1) {
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  echo '<option value="' . $row['id_lop'] . ' " > ' . $row['MaLop'] . ' </option>';
                }
              }
              echo $sql;
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>File </label>
            <input type="file" name="image" id="image" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Tóm Tắt</label>
            <input type="text" name="tom_tat" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Ngày Đăng</label>
            <input type="text" name="ngay_dang" readonly class="form-control" value="<?php echo date("d-m-Y"); ?>">
          </div>
          <div class="form-group">
            <label> Nhân Viên </label>
            <input class="form-control" hidden readonly name="id_nv" value=" <?php echo $data_user['id'] ?>">
            <input class="form-control" readonly name="manv" value=" <?php echo $data_user['username'] ?>">
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="add_tl" class="btn btn-primary">Lưu</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Quản Lý Tài Liệu</h1>
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
      <?php
      if ($data_user['usertype'] == '6') {
        echo '';
      } else {
        echo '<button type="button" id="add_button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
        Thêm Tài Liệu
      </button> ';
      }
      ?>
      <form action="<?php echo $_DOMAIN . 'tailieu' ?>" method="post">
        <div class="">
          <div id="dataTable_filter" class="dataTables_filter">
            <label for="search">Tìm kiếm
              <input type="text" name="search" id="search_text" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
            </label>&nbsp;
            <span <?php if ($data_user['usertype'] == 5 || $data_user['usertype'] == 6) {
                    echo 'hidden';
                  } ?>>
              <label>Người Đăng</label>
              <select style="border-radius: 5px; border-style:ridge" name="chucvu">
                <option value="1">Tất Cả</option>
                <?php
                $sql = "SELECT * FROM chuc_vu WHERE id_cv in (2,5) ";
                if ($db->num_rows($sql)) {
                  $serial_number = 0;
                  foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                    echo '
                                <option value="usertype=' . $row['id_cv'] . ' " > ' . $row['TenChucVu'] . '  </option>
                                        ';
                  }
                }
                ?>
              </select>&nbsp;</span>
            <span <?php if ($data_user['usertype'] == 6) {
                    echo 'hidden';
                  } ?>>
            <label>Ngày</label>
            <select style="border-radius: 5px; border-style:ridge" name="ngay">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT DISTINCT NgayDang FROM `tai_lieu` where 20";
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
            </span>     
            <label hidden>Lớp</label>
            <select hidden style="border-radius: 5px; border-style:ridge" name="lop">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT distinct tai_lieu.id_lop,MaLop FROM `tai_lieu` join lop_hoc on lop_hoc.id_lop = tai_lieu.id_lop 
              where trangthailop in (4,5)";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
              ?>
                  <option value="<?php echo "tai_lieu.id_lop='" . $row['id_lop'] . "'"; ?>">
                    <?php echo $row['MaLop']; ?></option>
              <?php
                }
              }
              ?>
            </select>&nbsp;
            <span <?php if ($data_user['usertype'] == 6) {
                    echo 'hidden';
                  } ?>>
              <label>Tình Trạng</label>
              <select style="border-radius: 5px; border-style:ridge" name="status">
                <option value="1">Tất Cả</option>
                <?php
                $sql = "SELECT distinct TrangThai FROM tai_lieu";
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
            </span>
            <label><i class="fa fa-sort"></i></label>
            <select style="border-radius: 5px; border-style:ridge" name="tt">
              <option value="ORDER By id_tailieu ASC">Cũ Nhất</option>
              <option value="ORDER By id_tailieu DESC">Mới Nhất</option>
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
              <th>Lớp </th>
              <th>File </th>
              <?php
              if ($data_user['usertype'] != '6') {
                echo '<th>Ngày Đăng</th>
                          <th>Nhân Viên Đăng </th> 
                        <th>Trạng Thái Duyệt</th>
                          <th> </th>
                          <th> </th>
                      <th> </th>';
              }
              ?>

            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['submit'])) {
              $id = $data_user['id'];
              $a = $_POST['chucvu'];
              $search = $_POST['search'];
              $tt = $_POST['tt'];
              $b = $_POST['lop'];
              $ngay = $_POST['ngay'];
              $status = $_POST['status'];
              if ($data_user['usertype'] == 5) {
                $sql = "SELECT * FROM tai_lieu JOIN register on register.id=tai_lieu.id_nv 
              JOIN lop_hoc On lop_hoc.id_lop=tai_lieu.id_lop 
              where register.id='$id' and (( $ngay and $b and $status and TuaDe like '%$search%') 
              or ($ngay and $b and $status and register.username like '%$search%')
              or ($ngay and $b and $status and MaLop like '%$search%')) $tt";
              } elseif($data_user['usertype'] == 6){
                $sql = "SELECT * FROM tai_lieu 
                JOIN lop_hoc On lop_hoc.id_lop=tai_lieu.id_lop 
                JOIN chi_tiet_lop_hoc On chi_tiet_lop_hoc.id_lop=lop_hoc.id_lop
                JOIN register on register.id=chi_tiet_lop_hoc.id_hs
              where register.id='$id' and (( $ngay and $b and $status and TuaDe like '%$search%') 
              or ($ngay and $b and $status and register.username like '%$search%')
              or ($ngay and $b and $status and MaLop like '%$search%')) $tt";
              } else {
                $sql = "SELECT * FROM tai_lieu JOIN register on register.id=tai_lieu.id_nv 
              JOIN lop_hoc On lop_hoc.id_lop=tai_lieu.id_lop 
              where ($a and $ngay and $b and $status and TuaDe like '%$search%') 
              or ($a and $ngay and $b and $status and register.username like '%$search%')
              or ($a and $ngay and $b and $status and MaLop like '%$search%') $tt";
              }
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
                  if ($row['TrangThai'] == 1) {
                    $trangthai = '✔';
                  } else {
                    $trangthai = '❌';
                  }
                  echo '
                <tr>
                  <td> ' . $serial_number . '</td>
                  <td> ' . $row['TuaDe'] . '</td>
                  <td> ' . $row['MaLop'] . '</td>
                  <td> <a href="anh_nhan_vien/' . $row['file'] . ' ?>">Tài Liệu</a></td>
		';
                  if ($data_user['usertype'] != '6') {
                    echo '<td> ' . $row['NgayDang'] . '</td>
                  <td> ' . $row['username'] . '</td>   
                  <td> ' . $trangthai . '</td>
                  <td>
                      <form action="' . $_DOMAIN . 'tailieu_edit_file" method="POST">
                          <input type="hidden" name="edit_id" value="' . $row['id_tailieu'] . '" >
                          <button type="submit" name="edit_file" class="btn btn-warning"> Sửa File</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="' . $_DOMAIN . 'tailieu_edit" method="POST">
                          <input type="hidden" name="edit_id" value="' . $row['id_tailieu'] . '" >
                          <button type="submit" name="edit_btn" class="btn btn-success"> Xem</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="tai_lieu_code.php" method="POST">
                        <input type="hidden" name="delete_id" value="' . $row['id_tailieu'] . '">
                        <button type="submit" name="delete_btn" class="btn btn-danger"> Xóa</button>
                      </form>
                  </td>';
                  }
                  echo '</tr>';
                }
              } else {
                echo '<b>Không tìm thấy dữ liệu</b>';
              }
            }else {
              if ($data_user['usertype'] == 5) {
                $sql = "SELECT * FROM tai_lieu JOIN register on register.id=tai_lieu.id_nv 
              JOIN lop_hoc On lop_hoc.id_lop=tai_lieu.id_lop where register.id='$id' order by id_tailieu DESC";
              }elseif($data_user['usertype'] == 6){
                $sql = "SELECT * FROM tai_lieu 
                JOIN lop_hoc On lop_hoc.id_lop=tai_lieu.id_lop 
                JOIN chi_tiet_lop_hoc On chi_tiet_lop_hoc.id_lop=lop_hoc.id_lop
                JOIN register on register.id=chi_tiet_lop_hoc.id_hs
              where register.id='$id' ";
              }  else {
                $sql = "SELECT * FROM tai_lieu JOIN register on register.id=tai_lieu.id_nv 
              JOIN lop_hoc On lop_hoc.id_lop=tai_lieu.id_lop order by id_tailieu DESC";
              }
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
                  if ($row['TrangThai'] == 1) {
                    $trangthai = '✔';
                  } else {
                    $trangthai = '❌';
                  }
                  echo '
                <tr>
                  <td> ' . $serial_number . '</td>
                  <td> ' . $row['TuaDe'] . '</td>
                  <td> ' . $row['MaLop'] . '</td>
                  <td> <a href="anh_nhan_vien/' . $row['file'] . ' ?>">Tài Liệu</a></td>
		';
                  if ($data_user['usertype'] != '6') {
                    echo '<td> ' . $row['NgayDang'] . '</td>
                  <td> ' . $row['username'] . '</td>   
                  <td> ' . $trangthai . '</td>
                  <td>
                      <form action="' . $_DOMAIN . 'tailieu_edit_file" method="POST">
                          <input type="hidden" name="edit_id" value="' . $row['id_tailieu'] . '" >
                          <button type="submit" name="edit_file" class="btn btn-warning"> Sửa File</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="' . $_DOMAIN . 'tailieu_edit" method="POST">
                          <input type="hidden" name="edit_id" value="' . $row['id_tailieu'] . '" >
                          <button type="submit" name="edit_btn" class="btn btn-success"> Xem</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="tai_lieu_code.php" method="POST">
                        <input type="hidden" name="delete_id" value="' . $row['id_tailieu'] . '">
                        <button type="submit" name="delete_btn" class="btn btn-danger"> Xóa</button>
                      </form>
                  </td>';
                  }
                  echo '</tr>';
                }
              }
            }
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
          url: 'tai_lieu_code.php',
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