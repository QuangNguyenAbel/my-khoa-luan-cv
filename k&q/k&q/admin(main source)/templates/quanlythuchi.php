<div class="modal fade" id="addadminprofile2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tạo Khoản Chi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="quan_ly_thu_chi_code.php" method="POST">
        <div class="modal-body">
          <input type="hidden" name="thu_chi" value="Chi">
          <div class="form-group">
            <label> Ngày Tháng </label>
            <input type="date" name="ngay_thang" value="<?php echo date("Y-m-d"); ?>" class="form-control" required>
          </div>
          <?php
          $sql = "SELECT * FROM `loai_thu_chi` WHERE Loai='Chi'";
          if ($db->num_rows($sql)) {
            $serial_number = 0;
            echo '<div class="form-group">
              <label> Loại Chi </label>
              <select id="loai_chi" name="loai" class="form-control ">';
            foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
              $serial_number++;
              echo '
               <option value="' . $row['id_loaithuchi'] . '"> ' . $row['TenLoai'] . ' </option>
		';
            }
            echo ' </select>
            </div>';
          }
          ?>
          <div class="form-group">
            <label> Tên Nhân Viên </label>
            <input class="form-control" readonly name="nguoi" value=" <?php echo $data_user['username'] ?>">
            <input class="form-control" hidden name="id_nguoi" value=" <?php echo $data_user['id'] ?>">
          </div>
          <div class="form-group">
            <label>Nội Dung </label>
            <input type="text" name="noi_dung" class="form-control" required="" required>
          </div>
          <div id="chi" class="form-group">
            <label>Số Tiền Chi</label>
            <input type="text" name="tien_chi" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Ghi Chú</label>
            <input type="text" name="ghi_chu" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="addchi_btn" class="btn btn-primary">Lưu</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Báo Cáo Doanh Thu</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile2">
        Tạo Khoản Chi
      </button>
      <a class="btn btn-info " href="<?php echo '' . $_DOMAIN . 'xemthongke'; ?>">Xem Thống Kê</a>
      <a class="btn btn-info " href="<?php echo '' . $_DOMAIN . 'xuatphieuchi'; ?>">Xuất Phiếu Chi</a>
      <form action="<?php echo $_DOMAIN . 'doanhthu' ?>" method="post">
        <div>
          <div id="dataTable_filter" class="dataTables_filter">
            <label for="search">Tìm kiếm
              <input type="text" name="search" class="form-control" placeholder="" aria-controls="dataTable">
            </label>&nbsp;
            <label>Thu/Chi</label>
            <select style="border-radius: 5px; border-style:ridge" name="ThuChi">
              <option value="">Tất Cả</option>
              <?php
              $sql = "SELECT distinct ThuChi from thu_chi";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  echo '
                                <option > ' . $row['ThuChi'] . '  </option>
                                        ';
                }
              }
              ?>
            </select>&nbsp;

            <label>Loại</label>
            <select style="border-radius: 5px; border-style:ridge" name="id_loaithuchi">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT * from loai_thu_chi";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  echo '
                                <option value="thu_chi.loai=' . $row['id_loaithuchi'] . ' " > ' . $row['TenLoai'] . '  </option>
                                        ';
                }
              }
              ?>
            </select>&nbsp;
            <label>Ngày</label>
            <select style="border-radius: 5px; border-style:ridge" name="NgayThang">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT DISTINCT NgayThang FROM `thu_chi` where 20 order by id_thuchi desc";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
              ?>
                  <option value="<?php echo "NgayThang='" . $row['NgayThang'] . "'"; ?>">
                    <?php echo date("d-m-Y", strtotime($row['NgayThang'])); ?></option>
              <?php
                }
              }
              ?>
            </select>&nbsp;
            <label><i class="fa fa-sort"></i></label>
            <select style="border-radius: 5px; border-style:ridge" name="tt">
              <option value="ORDER By id_thuchi DESC">Mới Nhất</option>
              <option value="ORDER By id_thuchi ASC">Cũ Nhất</option>
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
              <th>STT</th>
              <th>Ngày Tháng</th>
              <th>Thu/Chi</th>
              <th>Loại</th>
              <th>Người</th>
              <th>Nội Dung</th>
              <th>Thu</th>
              <th>Chi</th>
              <th>Luỹ Kế</th>
              <th>Ghi Chú</th>
              <th> </th>
              <th> </th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['submit'])) {
              $search = $_POST['search'];
              $a = $_POST['ThuChi'];
              $b = $_POST['id_loaithuchi'];
              $c = $_POST['NgayThang'];
              $tt = $_POST['tt'];
              $sql = "SELECT * FROM `thu_chi` 
              JOIN loai_thu_chi On loai_thu_chi.id_loaithuchi=thu_chi.loai 
              JOIN register On register.id=thu_chi.id_nv
              where ThuChi like'%$a%' and $b and $c and username like '%$search%' $tt";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
                  $tien = $row['LuyKe'];
                  $luy_ke = 0;
                  $luy_ke = $luy_ke + $tien;
                  $luy_ke1 = number_format($luy_ke);
                  $thoigian = $row['NgayThang'];
                  $so_tien_thu = $row['SoTienThu'];
                  $tien_thu = number_format($so_tien_thu);
                  $so_tien_chi = $row['SoTienChi'];
                  $tien_chi = number_format($so_tien_chi);
                  $date = date("d-m-Y", strtotime($thoigian));
                  echo '
                  <tr>
                  <td> ' . $serial_number . '</td>
                  <td> ' . $date . '</td>
                  <td> ' . $row['ThuChi'] . '</td>
                  <td> ' . $row['TenLoai'] . '</td>
                  <td> ' . $row['username'] . '</td>
                  <td> ' . $row['NoiDung'] . '</td>
                  <td> ' . $tien_thu . '</td>
                  <td> ' . $tien_chi . '</td>
                  <td> ' . $luy_ke1 . '</td>
                  <td> ' . $row['GhiChu'] . '</td>
                  <td>'; 
                  if($row['ThuChi']=='Thu'){
                    echo'<form action="' . $_DOMAIN . 'doanhthu_edit" method="POST">
                    <input type="hidden" name="edit_id" value="' . $row['id_thuchi'] . '">
                    <button type="submit" name="edit_btn"  class="btn btn-success" disabled> Sửa</button>
                  </form>
                </td>
                <td>
                <form action="quan_ly_thu_chi_code.php" method="POST">
                  <input type="hidden" name="delete_id" value="' . $row['id_thuchi'] . '">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> Xoá</button>
                </form>
              </td>
                </tr>';
                  }else{
                    echo '<form action="' . $_DOMAIN . 'doanhthu_edit" method="POST">
                    <input type="hidden" name="edit_id" value="' . $row['id_thuchi'] . '">
                    <button type="submit" name="edit_btn" class="btn btn-success"> Sửa</button>
                  </form>
                </td>
                <td>
                <form action="quan_ly_thu_chi_code.php" method="POST">
                  <input type="hidden" name="delete_id" value="' . $row['id_thuchi'] . '">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> Xoá</button>
                </form>
              </td>
                </tr>';
                  }
		
                }
              } else {
                echo "<b>Không tìm thấy dữ liệu</b>";
                echo $sql;
              }
            } else {
              $sql = "SELECT * FROM `thu_chi` 
              JOIN loai_thu_chi On loai_thu_chi.id_loaithuchi=thu_chi.loai 
              JOIN register On register.id=thu_chi.id_nv order by id desc";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
                  $tien = $row['LuyKe'];
                  $luy_ke = 0;
                  $luy_ke = $luy_ke + $tien;
                  $luy_ke1 = number_format($luy_ke);
                  $thoigian = $row['NgayThang'];
                  $so_tien_thu = $row['SoTienThu'];
                  $tien_thu = number_format($so_tien_thu);
                  $so_tien_chi = $row['SoTienChi'];
                  $tien_chi = number_format($so_tien_chi);
                  $date = date("d-m-Y", strtotime($thoigian));
                  echo '
                    <tr>
                    <td> ' . $serial_number . '</td>
                    <td> ' . $date . '</td>
                    <td> ' . $row['ThuChi'] . '</td>
                    <td> ' . $row['TenLoai'] . '</td>
                    <td> ' . $row['username'] . '</td>
                    <td> ' . $row['NoiDung'] . '</td>
                    <td> ' . $tien_thu . '</td>
                    <td> ' . $tien_chi . '</td>
                    <td> ' . $luy_ke1 . '</td>
                    <td> ' . $row['GhiChu'] . '</td>
                    <td>';
                    if($row['ThuChi']=='Thu'){
                      echo'<form action="' . $_DOMAIN . 'doanhthu_edit" method="POST">
                      <input type="hidden" name="edit_id" value="' . $row['id_thuchi'] . '">
                      <button type="submit" name="edit_btn"  class="btn btn-success" disabled> Sửa</button>
                    </form>
                  </td>
                  <td>
                  <form action="quan_ly_thu_chi_code.php" method="POST">
                    <input type="hidden" name="delete_id" value="' . $row['id_thuchi'] . '">
                    <button type="submit" name="delete_btn" class="btn btn-danger"> Xoá</button>
                  </form>
                </td>
                  </tr>';
                    }else{
                      echo '<form action="' . $_DOMAIN . 'doanhthu_edit" method="POST">
                      <input type="hidden" name="edit_id" value="' . $row['id_thuchi'] . '">
                      <button type="submit" name="edit_btn" class="btn btn-success"> Sửa</button>
                    </form>
                  </td>
                  <td>
                  <form action="quan_ly_thu_chi_code.php" method="POST">
                    <input type="hidden" name="delete_id" value="' . $row['id_thuchi'] . '">
                    <button type="submit" name="delete_btn" class="btn btn-danger"> Xoá</button>
                  </form>
                </td>
                  </tr>';
                }
              }}
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