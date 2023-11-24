<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Đăng Ký Thi Lại</h1>
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
    <div class="card-header py-6">
      <form action="<?php echo $_DOMAIN . 'dangky_thilai' ?>" method="post">
        <div class="">
          <div id="dataTable_filter" class="dataTables_filter">
            <label for="search">Tìm kiếm
              <input type="text" name="search" id="search_text" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
            </label>&nbsp;
            <label>Bộ Môn</label>
            <select style="border-radius: 5px; border-style:ridge" name="bo_mon">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT * FROM bo_mon";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  echo '
                                <option value="mon_hoc.type=' . $row['id_bo_mon'] . ' " > ' . $row['ten_bomon'] . '  </option>
                                        ';
                }
              }
              ?>
            </select>&nbsp;
            <label>Trạng Thái</label>
            <select style="border-radius: 5px; border-style:ridge" name="trang_thai_lop">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT * from trang_thai_lop WHERE id_ttl in (14,15,16)";
              $serial_number = 0;
              foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                if ($db->num_rows($sql)) {
                  echo '
                                <option value="trangthailop=' . $row['id_ttl'] . ' " > ' . $row['ten_ttl'] . '  </option>
                                        ';
                }
              }
              ?>
            </select>&nbsp;
              <label>Ca Thi</label>
              <select style="border-radius: 5px; border-style:ridge" name="ca_hoc">
                <option value="1">Tất Cả</option>
                <?php
                $sql = "SELECT *  FROM `gio_thi` ";
                if ($db->num_rows($sql)) {
                  $serial_number = 0;
                  foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                ?>
                    <option value="<?php echo "lop_hoc.id_cathi='" . $row['id_giothi'] . "'"; ?>">
                      <?php echo $row['gio_thi']; ?></option>
                <?php
                  }
                }
                ?>
              </select>&nbsp;
              <label><i class="fa fa-sort"></i></label>
              <select style="border-radius: 5px; border-style:ridge" name="tt">
                <option value="ORDER By id_lop ASC">Cũ Nhất</option>
                <option value="ORDER By id_lop DESC">Mới Nhất</option>
              </select>&nbsp;
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
              <th style="text-align: center">STT </th>
              <th style="text-align: center">Tên Môn Học </th>
              <th style="text-align: center">Mã Lớp</th>
              <th style="text-align: center">Niên Khoá </th>
              <th style="text-align: center">Giảng Viên Gác Thi</th>
              <th style="text-align: center">Lịch Thi</th>
              <th style="text-align: center">Phòng Thi</th>
              <th style="text-align: center">Ngày Thi</th>              
              <th style="text-align: center">Số lượng</th>
              <th style="text-align: center">Trạng thái</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $user=$data_user['id'];
            if (isset($_POST['submit'])) {
              $search = $_POST['search'];
              $tt = $_POST['tt'];
              $bo_mon = $_POST['bo_mon'];
              $trang_thai_lop = $_POST['trang_thai_lop'];
              $ca_hoc = $_POST['ca_hoc'];
              $sql = "SELECT * FROM `lop_hoc` 
              JOIN nien_khoa On nien_khoa.id_nk=lop_hoc.Khoa 
              JOIN trang_thai_lop ON trang_thai_lop.id_ttl=lop_hoc.trangthailop 
              JOIN mon_hoc On mon_hoc.id_mon=lop_hoc.id_mh 
              LEFT JOIN ca_hoc On ca_hoc.id_ca=lop_hoc.id_cathi 
              LEFT JOIN phong_hoc On phong_hoc.id_phong=lop_hoc.id_phongthi 
              Left JOIN bo_mon On bo_mon.id_bo_mon=mon_hoc.id_mon 
              Left Join register On lop_hoc.id_gv_thi=register.id 
              LEFT JOIN gio_thi on gio_thi.id_giothi = lop_hoc.id_cathi 
              WHERE trangthailop in (14,15,16) AND nien_khoa.trangthai_nk=4 and lop_hoc.id_mh in 
              (SELECT DISTINCT id_mh FROM register 
                  JOIN chi_tiet_lop_hoc on chi_tiet_lop_hoc.id_hs = register.id
                  JOIN lop_hoc on lop_hoc.id_lop = chi_tiet_lop_hoc.id_lop
                  JOIN nien_khoa on lop_hoc.Khoa=nien_khoa.id_nk
                  WHERE register.id = $user) 
                  and lop_hoc.id_lop Not in (SELECT chi_tiet_lop_hoc.id_lop FROM `chi_tiet_lop_hoc` WHERE chi_tiet_lop_hoc.id_hs=$user)
              and (($bo_mon  and $trang_thai_lop  
                   and $ca_hoc and MaLop like '%$search%') 
              or ($bo_mon  and $trang_thai_lop  
                   and $ca_hoc and register.username like '%$search%')
              or ($bo_mon  and $trang_thai_lop  
                   and $ca_hoc and mon_hoc.ten_monhoc like '%$search%')) $tt";

              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
                  echo '
                <tr>
                  <td> ' . $serial_number . '</td>
                  <td> ' . $row['ten_monhoc'] . '</td>
                  <td> ' . $row['MaLop'] . '</td>
                  <td> ' . $row['ten_nk'] . '</td>
                  <td> ' . $row['username'] . '</td>
                  <td> ' . $row['gio_thi']. '</td>
                  <td> ' . $row['Phong'] . '</td>
                  <td> ' . date("d-m-Y", strtotime($row['ngay_thi'])) . ' </td>
                  <td> ' . $row['da_dk'] . '/' . $row['si_so'] . '</td>
                  <td> ' . $row['ten_ttl'] . '</td>  
                  <td> 
                  <form action="quanlykhoa_thilai_code.php" method="POST">
                    <input type="hidden" name="MaLop" value="' . $row['MaLop'] . '">
                    <input type="hidden" name="id_lop" value="' . $row['id_lop'] . '">
                    <input type="hidden" name="id_hv" value="' . $user . '">
                    <button type="submit" name="dk_thilai" class="btn btn-primary">Đăng Ký</button>
                  </form>
                </td>';
                }
              } else {
                echo '<b>Không tìm thấy dữ liệu</b>';
              }
            } else {
              $sql = "SELECT * FROM `lop_hoc` 
              JOIN nien_khoa On nien_khoa.id_nk=lop_hoc.Khoa 
              JOIN trang_thai_lop ON trang_thai_lop.id_ttl=lop_hoc.trangthailop 
              JOIN mon_hoc On mon_hoc.id_mon=lop_hoc.id_mh 
              LEFT JOIN ca_hoc On ca_hoc.id_ca=lop_hoc.id_cathi 
              LEFT JOIN phong_hoc On phong_hoc.id_phong=lop_hoc.id_phongthi 
              Left JOIN bo_mon On bo_mon.id_bo_mon=mon_hoc.id_mon 
              Left Join register On lop_hoc.id_gv_thi=register.id 
              LEFT JOIN gio_thi on gio_thi.id_giothi = lop_hoc.id_cathi 
              WHERE trangthailop in (14,15,16) AND nien_khoa.trangthai_nk=4 and lop_hoc.id_mh in 
              (SELECT DISTINCT id_mh FROM register 
                  JOIN chi_tiet_lop_hoc on chi_tiet_lop_hoc.id_hs = register.id
                  JOIN lop_hoc on lop_hoc.id_lop = chi_tiet_lop_hoc.id_lop
                  JOIN nien_khoa on lop_hoc.Khoa=nien_khoa.id_nk
                  WHERE register.id = $user) 
                  and lop_hoc.id_lop Not in (SELECT chi_tiet_lop_hoc.id_lop FROM `chi_tiet_lop_hoc` WHERE chi_tiet_lop_hoc.id_hs=$user)
                 
              ";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
                  echo '
                <tr>
                  <td> ' . $serial_number . '</td>
                  <td> ' . $row['ten_monhoc'] . '</td>
                  <td> ' . $row['MaLop'] . '</td>
                  <td> ' . $row['ten_nk'] . '</td>
                  <td> ' . $row['username'] . '</td>
                  <td> ' . $row['gio_thi']. '</td>
                  <td> ' . $row['Phong'] . '</td>
                  <td> ' . date("d-m-Y", strtotime($row['ngay_thi'])) . ' </td>
                  <td> ' . $row['da_dk'] . '/' . $row['si_so'] . '</td>
                  <td> ' . $row['ten_ttl'] . '</td> 
                  <td> 
                  <form action="quanlykhoa_thilai_code.php" method="POST">
                    <input type="hidden" name="MaLop" value="' . $row['MaLop'] . '">
                    <input type="hidden" name="id_lop" value="' . $row['id_lop'] . '">
                    <input type="hidden" name="id_hv" value="' . $user . '">
                    <button type="submit" name="dk_thilai" class="btn btn-primary">Đăng Ký</button>
                  </form>
                </td>';
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