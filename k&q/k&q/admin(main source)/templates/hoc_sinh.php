<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Thông Tin Học Viên</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <form action="<?php echo $_DOMAIN . 'hocvien' ?>" method="post">
        <div class="">
          <div id="dataTable_filter" class="dataTables_filter">
            <label for="search">Tìm kiếm
              <input type="text" name="search" class="form-control" placeholder="" aria-controls="dataTable">
            </label>&nbsp;
            <label><i class="fa fa-sort"></i></label>
            <select style="border-radius: 5px; border-style:ridge" name="tt">
              <option value="ORDER By id ASC">Tăng Dần</option>
              <option value="ORDER By id DESC">Giảm Dần</option>
            </select>
            <button type="submit" name="submit" class="btn btn-success"> Tìm Kiếm </button>
            </td>
          </div>
        </div>
      </form>
      <b>Lưu Ý: Chức năng tìm kiếm có thể dùng để tìm kiếm tên Học Viên, Mã Học Viên</b>
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
          <div class="row">

          </div>
          <thead align="center">
            <tr>
              <th>STT </th>
              <th>Tên Học Viên </th>
              <th>Mã Học Viên </th>
              <th></th>
              <th <?php if($data_user['usertype']==1){echo 'hidden';} ?>></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['submit'])) {
              $search = $_POST['search'];
              $tt = $_POST['tt'];
              $sql = "SELECT DISTINCT 
              register.id,register.username,register.user_code,register.email,register.phone,register.address 
               FROM `register` 
              LEFT JOIN chi_tiet_lop_hoc on chi_tiet_lop_hoc.id_hs = register.id
              WHERE usertype=6 and username like '%$search%'
              OR usertype=6 and user_code like '%$search%' $tt ";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
            ?>
                  <tr>
                    <td> <?php echo $serial_number; ?></td>
                    <td> <?php echo $row['username']; ?> </td>
                    <td> <?php echo $row['user_code']; ?> </td>
                    <td>
                      <form action="<?php echo '' . $_DOMAIN . 'hocvien_edit_img'; ?>" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_img" class="btn btn-warning"> Sửa Ảnh</button>
                      </form>
                    </td>
                    <td <?php if($data_user['usertype']==1){echo 'hidden';} ?>>
                      <form action="<?php echo '' . $_DOMAIN . 'hocvien_lophoc' ?>" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="username" value="<?php echo $row['username']; ?>">
                        <input type="hidden" name="user_code" value="<?php echo $row['user_code']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-primary"> Lớp Học</button>
                      </form>
                    </td>
                    <td>
                      <form action="<?php echo '' . $_DOMAIN . 'hocvien_edit' ?>" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-success"> Xem</button>
                      </form>
                    </td>
                    <td>
                      <form action="hoc_sinh_code.php" method="POST">
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
              where usertype = 6";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;

                ?>
                  <tr>
                    <td> <?php echo $serial_number; ?></td>
                    <td> <?php echo $row['username']; ?> </td>
                    <td> <?php echo $row['user_code']; ?> </td>
                    <td>
                      <form action="<?php echo '' . $_DOMAIN . 'hocvien_edit_img'; ?>" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_img" class="btn btn-warning"> Sửa Ảnh</button>
                      </form>
                    </td>
                    <td <?php if($data_user['usertype']==1){echo 'hidden';} ?>>
                    <form action="<?php echo '' . $_DOMAIN . 'hocvien_lophoc' ?>" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="username" value="<?php echo $row['username']; ?>">
                        <input type="hidden" name="user_code" value="<?php echo $row['user_code']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-primary"> Lớp Học</button>
                      </form>
                    </td>
                    <td>
                      <form action="<?php echo '' . $_DOMAIN . 'hocvien_edit' ?>" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-success"> Xem</button>
                      </form>
                    </td>
                    <td>
                      <form action="hoc_sinh_code.php" method="POST">
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
          url: 'hoc_sinh_code.php',
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