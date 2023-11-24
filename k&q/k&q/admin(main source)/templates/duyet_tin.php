<!-- Add Button -->
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Duyệt Tin</h1>
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
      <form action="<?php echo $_DOMAIN . 'duyet_tin' ?>" method="post">
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
              <th>Mã Nhân Viên </th>
              <th>Trạng Thái</th>
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
                      <form action="<?php echo '' . $_DOMAIN . 'duyet_tin_tt' ?>" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-success">Xem</button>
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
                      <form action="<?php echo '' . $_DOMAIN . 'duyet_tin_tt' ?>" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id_tt']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-success">Xem</button>
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