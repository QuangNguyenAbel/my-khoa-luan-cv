<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Tài Khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="register_code.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Họ Tên</label>
            <input type="text" name="hoten" class="form-control">
          </div>
          <div class="form-group">
            <label>Địa Chỉ</label>
            <input type="text" name="dia_chi" class="form-control">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control">
          </div>
          <div class="form-group">
            <label>Số Điện Thoại</label>
            <input type="text" name="sdt" class="form-control">
          </div>
          <?php
          $sql = "SELECT * FROM trinh_do";
          if ($db->num_rows($sql)) { {
          ?>
              <div class="form-group">
                <label> Trình Độ Chuyên Môn </label>
                <select name="trinh_do" class="form-control ">
                  <?php
                  foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  ?>
                    <option value="<?php echo $row['id_trinhdo'] ?>"> <?php echo $row['TrinhDo'] ?> </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
          <?php
            }
          } else {
            echo "No Data Available";
          }
          ?>
          <?php
          if($data_user['usertype']==1){
          $sql = "SELECT * FROM chuc_vu";
          if ($db->num_rows($sql)) { {
          ?>
              <div class="form-group">
                <label> Chức Vụ </label>
                <select name="chuc_vu" class="form-control ">
                  <?php
                  foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  ?>
                    <option value="<?php echo $row['id_cv'] ?>"> <?php echo $row['TenChucVu'] ?> </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
          <?php
            }
          } else {
            echo "No Data Available";
          }
        }else{
          echo'<input type="text" readonly name="chuc_vu" value="6" class="form-control">';
        }
          ?>
          <div class="form-group">
            <label>Ngày Sinh </label>
            <input type="date" name="ngay_sinh" class="form-control">
          </div>

          <div class="form-group">
            <label>Hình Ảnh </label>
            <input type="file" name="image" id="image" class="form-control">
          </div>
          <div class="form-group">
            <label>Mật Khẩu</label>
            <input type="password" name="password" class="form-control" required placeholder="Nhập Mật Khẩu">
          </div>

        </div>
        <div class="modal-footer">
          
          <?php 
            if($data_user['usertype']==1)
            {
              echo '<button type="submit" name="add_ns" class="btn btn-success">Thêm Nhân Sự</button>';
            }
          ?>
          <button type="submit" name="add_hv" class="btn btn-primary">Thêm Học Viên</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Quản Lý Tài Khoản</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
        Thêm Tài Khoản
      </button></br></br>
      <form action="<?php echo $_DOMAIN . 'taikhoan' ?>" method="post">
        <div class="">
          <div id="dataTable_filter" class="dataTables_filter">
            <label for="search">Tìm kiếm
              <input type="text" name="search" id="search_text" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
            </label>&nbsp;
            <span <?php if($data_user['usertype']!=1){echo 'hidden';} ?> >
            <label>Loại Tài Khoản</label>
            <select style="border-radius: 5px; border-style:ridge" name="chucvu">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT * FROM chuc_vu";
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
            </span>
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
              <th>STT</th>
              <th>Email </th>
              <th>Username </th>
              <th>Usercode</th>
              <th>Role</th>
              <th <?php if($data_user['usertype']!=1){echo 'hidden';} ?>> </th>
              <th <?php if($data_user['usertype']!=1){echo 'hidden';} ?>> </th>
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
              if($data_user['usertype']!=1){
                $sql = "SELECT chuc_vu.TenChucVu,register.id,register.email,register.username,register.status,register.usertype,user_code
                from register join chuc_vu on chuc_vu.id_cv=register.usertype where ($a and usertype=6 and username like '%$search%') 
            Or ($a and usertype=6 and user_code like '%$search%') $tt";
              }else{
                $sql = "SELECT * 
            from register join chuc_vu on chuc_vu.id_cv=register.usertype where ($a and username like '%$search%') 
            Or ($a  and user_code like '%$search%') $tt";
              }
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
            ?>
                  <tr>
                    <td> <?php echo $serial_number; ?></td>
                    <td> <?php echo $row['email']; ?></td>
                    <td> <?php echo $row['username']; ?></td>
                    <td> <?php echo $row['user_code']; ?></td>
                    <td> <?php echo $row['TenChucVu']; ?> </td>
                    <td <?php if($data_user['usertype']!=1){echo 'hidden';} ?>>
                      <?php
                      if ($row['status'] == 1) {
                        echo '<form action="register_code.php" method="POST">
                      <input type="hidden" name="mokhoa_id" value="' . $row['id'] . '">
                      <button type="submit" name="mokhoa" class="btn btn-primary"> Mở khóa tài khoản</button>
                    </form>';
                      } else {
                        echo '<form action="register_code.php" method="POST">
                      <input type="hidden" name="khoa_id" value="' . $row['id'] . '">
                      <button type="submit" name="khoa" class="btn btn-secondary"> Khóa Tài Khoản</button>
                    </form>';
                      }
                      ?>
                    </td>
                    <td <?php if($data_user['usertype']!=1){echo 'hidden';} ?>>
                      <form action="<?php echo '' . $_DOMAIN . 'taikhoan_edit_role'; ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="quyen" value="<?php echo $row['usertype']; ?>">
                        <input type="hidden" name="ten_quyen" value="<?php echo $row['TenChucVu']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-primary">Phân Quyền</button>
                      </form>
                    </td>
                    <td>
                      <form action="<?php echo '' . $_DOMAIN . 'taikhoan_edit'; ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-success">Sửa</button>
                      </form>
                    </td>
                    <td>
                      <form action="<?php echo '' . $_DOMAIN . 'taikhoan_edit_pass'; ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-warning">Đổi Mật Khẩu</button>
                      </form>
                    </td>
                    <td>
                      <form action="register_code.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger">Xóa</button>
                      </form>
                    </td>
                  </tr>
                <?php
                }
              }
              else{
                echo "<b>Không tìm thấy dữ liệu</b>";
              }
            } else {
              if($data_user['usertype']!=1){
                $sql = "SELECT chuc_vu.TenChucVu,register.id,register.email,register.username,register.status,register.usertype,user_code
              from register join chuc_vu on chuc_vu.id_cv=register.usertype where usertype=6 ";
              }else{
                $sql = "SELECT chuc_vu.TenChucVu,register.id,register.email,register.username,register.status,register.usertype,user_code
              from register join chuc_vu on chuc_vu.id_cv=register.usertype where 1 ";
              }
              
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
                ?>
                  <tr>
                    <td> <?php echo $serial_number; ?></td>
                    <td> <?php echo $row['email']; ?></td>
                    <td> <?php echo $row['username']; ?></td>
                    <td> <?php echo $row['user_code']; ?></td>
                    <td> <?php echo $row['TenChucVu']; ?> </td>
                    <td <?php if($data_user['usertype']!=1){echo 'hidden';} ?>>
                      <?php
                      if ($row['status'] == 1) {
                        echo '<form action="register_code.php" method="POST">
                      <input type="hidden" name="mokhoa_id" value="' . $row['id'] . '">
                      <button type="submit" name="mokhoa" class="btn btn-primary"> Mở khóa tài khoản</button>
                    </form>';
                      } else {
                        echo '<form action="register_code.php" method="POST">
                      <input type="hidden" name="khoa_id" value="' . $row['id'] . '">
                      <button type="submit" name="khoa" class="btn btn-secondary"> Khóa Tài Khoản</button>
                    </form>';
                      }
                      ?>
                    </td>
                    <td <?php if($data_user['usertype']!=1){echo 'hidden';} ?>>
                      <form action="<?php echo '' . $_DOMAIN . 'taikhoan_edit_role'; ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="quyen" value="<?php echo $row['usertype']; ?>">
                        <input type="hidden" name="ten_quyen" value="<?php echo $row['TenChucVu']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-primary">Phân Quyền</button>
                      </form>
                    </td>
                    <td>
                      <form action="<?php echo '' . $_DOMAIN . 'taikhoan_edit'; ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-success">Sửa</button>
                      </form>
                    </td>
                    <td>
                      <form action="<?php echo '' . $_DOMAIN . 'taikhoan_edit_pass'; ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-warning">Đổi Mật Khẩu</button>
                      </form>
                    </td>
                    <td>
                      <form action="register_code.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger">Xóa</button>
                      </form>
                    </td>
                  </tr>
            <?php
                }
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>