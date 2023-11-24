<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Duyệt Tài Liệu</h1>

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
      <form action="<?php echo $_DOMAIN . 'duyet_tailieu' ?>" method="post">
        <div class="">
          <div id="dataTable_filter" class="dataTables_filter">
            <label for="search">Tìm kiếm
              <input type="text" name="search" id="search_text" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
            </label>&nbsp;
            <label>Chức Vụ</label>
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
            </select>&nbsp;
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
            <label>Lớp</label>
            <select style="border-radius: 5px; border-style:ridge" name="lop">
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
              <th>Ngày Đăng</th>
              <th>Nhân Viên Đăng</th>
              <th>Trạng Thái Duyệt</th>
              <th> </th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['submit'])) {
              $a = $_POST['chucvu'];
              $search = $_POST['search'];
              $tt = $_POST['tt'];
              $b = $_POST['lop'];
              $ngay = $_POST['ngay'];
              $status=$_POST['status'];
              $sql = "SELECT * FROM tai_lieu JOIN register on register.id=tai_lieu.id_nv 
              JOIN lop_hoc On lop_hoc.id_lop=tai_lieu.id_lop 
              where ($a and $ngay and $b and $status and TuaDe like '%$search%') 
              or ($a and $ngay and $b and $status and register.username like '%$search%')
              or ($a and $ngay and $b and $status and MaLop like '%$search%') $tt";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
                  echo '
                            <tr>
                            <td> ' . $serial_number . '</td>
                            <td> ' . $row['TuaDe'] . '</td>
                            <td> ' . $row['MaLop'] . '</td>
                            <td> <a href="anh_nhan_vien/' . $row['file'] . ' ?>">Tài Liệu</a></td>
                            <td> ' . $row['NgayDang'] . '</td>
                            <td> ' . $row['username'] . '</td>';
                  if ($row['TrangThai'] == 1) {
                    echo '<td>✔</td>';
                  } else {
                    echo '<td>❌</td>';
                  }
                  echo '
                  <td>
                      <form action="' . $_DOMAIN . 'duyet_tailieu_tt" method="POST">
                          <input type="hidden" name="edit_id" value="' . $row['id_tailieu'] . '" >
                          <button type="submit" name="edit_btn" class="btn btn-success">Xem</button>                        
                      </form>
                  </td>
                  </tr>';
                }
              } else {
                echo "<b>Không tìm thấy dữ liệu</b>";
              }
            } else {
              $sql = "SELECT * FROM tai_lieu JOIN register on register.id=tai_lieu.id_nv 
              JOIN lop_hoc On lop_hoc.id_lop=tai_lieu.id_lop order by id_tailieu DESC";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
                  echo '
                            <tr>
                            <td> ' . $serial_number . '</td>
                            <td> ' . $row['TuaDe'] . '</td>
                            <td> ' . $row['MaLop'] . '</td>
                            <td> <a href="anh_nhan_vien/' . $row['file'] . ' ?>">Tài Liệu</a></td>
                            <td> ' . $row['NgayDang'] . '</td>
                            <td> ' . $row['username'] . '</td>';
                  if ($row['TrangThai'] == 1) {
                    echo '<td>✔</td>';
                  } else {
                    echo '<td>❌</td>';
                  }
                  echo '
                  <td>
                      <form action="' . $_DOMAIN . 'duyet_tailieu_tt" method="POST">
                          <input type="hidden" name="edit_id" value="' . $row['id_tailieu'] . '" >
                          <button type="submit" name="edit_btn" class="btn btn-warning">Xem</button>                        
                      </form>
                  </td>
                  </tr>';
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