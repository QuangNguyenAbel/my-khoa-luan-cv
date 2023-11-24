<!-- Add Button -->
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Đăng Ký Khoá Học</h1>
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
      <form action="<?php echo $_DOMAIN . 'dangkykhoahoc' ?>" method="post">
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
            <label>Học Phi</label>
            <select style="border-radius: 5px; border-style:ridge" name="hocphi">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT DISTINCT hocphi FROM `mon_hoc` order by hocphi asc";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
              ?>
                  <option value="<?php echo "mon_hoc.hocphi='" . $row['hocphi'] . "'"; ?>">
                    <?php echo number_format($row['hocphi']); ?></option>
              <?php
                }
              }
              ?>
            </select>&nbsp;
            <label>Trạng Thái</label>
            <select style="border-radius: 5px; border-style:ridge" name="trang_thai_lop">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT * from trang_thai_lop WHERE id_ttl in (1,2,3)";
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
            <label>Số Lượng</label>
            <select style="border-radius: 5px; border-style:ridge" name="si_so">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT DISTINCT si_so FROM `lop_hoc` WHERE 1";
              $serial_number = 0;
              foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                if ($db->num_rows($sql)) {
                  echo '
                                <option value="si_so=' . $row['si_so'] . ' " > ' . $row['si_so'] . '  </option>
                                        ';
                }
              }
              ?>
            </select>&nbsp;
            <div>

              <label>Ca Học</label>
              <select style="border-radius: 5px; border-style:ridge" name="ca_hoc">
                <option value="1">Tất Cả</option>
                <?php
                $sql = "SELECT *  FROM `ca_hoc` ";
                if ($db->num_rows($sql)) {
                  $serial_number = 0;
                  foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                ?>
                    <option value="<?php echo "lop_hoc.id_cahoc='" . $row['id_ca'] . "'"; ?>">
                      <?php echo $row['ten_ca'] . ': ' . $row['chitiet_ca']; ?></option>
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
              <th style="text-align: center">Giảng Viên</th>
              <th style="text-align: center">Lịch Học</th>
              <th style="text-align: center">Phòng Học</th>
              <th style="text-align: center">Học Phí</th>
              <th style="text-align: center">Hạn Đăng Ký</th>
              <th style="text-align: center">Ngày Khai Giảng</th>
              <th style="text-align: center">Ngày Kết Thúc</th>
              <th style="text-align: center">Số lượng</th>
              <th style="text-align: center">Trạng thái</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['submit'])) {
                $id = $data_user['id'];
              $search = $_POST['search'];
              $tt = $_POST['tt'];
              $bo_mon = $_POST['bo_mon'];
              $hocphi = $_POST['hocphi'];
              $trang_thai_lop = $_POST['trang_thai_lop'];
              $si_so = $_POST['si_so'];
              $ca_hoc = $_POST['ca_hoc'];
              $sql = "SELECT * FROM `lop_hoc` 
              JOIN nien_khoa On nien_khoa.id_nk=lop_hoc.Khoa 
              JOIN trang_thai_lop ON trang_thai_lop.id_ttl=lop_hoc.trangthailop
              JOIN mon_hoc On mon_hoc.id_mon=lop_hoc.id_mh
              LEFT JOIN ca_hoc On ca_hoc.id_ca=lop_hoc.id_cahoc
              JOIN phong_hoc On phong_hoc.id_phong=lop_hoc.id_phonghoc
              Left JOIN bo_mon On bo_mon.id_bo_mon=mon_hoc.id_mon
              Join register On lop_hoc.id_gv=register.id
              WHERE trangthailop IN (1,2,3) AND nien_khoa.trangthai_nk=4 
              and lop_hoc.id_lop Not in (SELECT chi_tiet_lop_hoc.id_lop FROM `chi_tiet_lop_hoc` WHERE chi_tiet_lop_hoc.id_hs=$id)
              AND (($bo_mon and $hocphi and $trang_thai_lop  
                  and $si_so and $ca_hoc and MaLop like '%$search%') 
              or ($bo_mon and $hocphi and $trang_thai_lop  
                  and $si_so and $ca_hoc and register.username like '%$search%')
              or ($bo_mon and $hocphi and $trang_thai_lop  
                  and $si_so and $ca_hoc and mon_hoc.ten_monhoc like '%$search%')) $tt";

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
                  <td> ' . $row['ten_ca'] . ': ' . $row['chitiet_ca'] . '</td>
                  <td> ' . $row['Phong'] . '</td>
                  <td> ' . number_format($row['hocphi']) . '</td> 
                  <td> ' . date("d-m-Y", strtotime($row['NgayChoDangKy'])) . ' Đến ' . date("d-m-Y", strtotime($row['HanDangKy'])) . '</td> 
                  <td> ' . date("d-m-Y", strtotime($row['NgayKhaiGiang'])) . '</td> 
                  <td> ' . date("d-m-Y", strtotime($row['NgayKetThuc'])) . '</td> 
                  <td> ' . $row['da_dk'] . '/' . $row['si_so'] . '</td>
                  <td> ' . $row['ten_ttl'] . '</td>  ';
                  if($row['trangthailop']==1){
                    echo '
                  <td> 
                    <form action="them_lop_hoc_dang_ky_code.php" method="POST">
                        <input type="hidden" name="MaLop" value="' . $row['MaLop'] . '">
                        <input type="hidden" name="id_hv" value="' . $id . '">
                        <input type="hidden" name="id_lop" value="' . $row['id_lop'] . '">
                        <button type="submit" disabled name="dangky" class="btn btn-info">Đăng Ký</button>
                    </form></td> ';
                  }else{
                    echo '
                  <td> 
                    <form action="them_lop_hoc_dang_ky_code.php" method="POST">
                        <input type="hidden" name="MaLop" value="' . $row['MaLop'] . '">
                        <input type="hidden" name="id_hv" value="' . $id . '">
                        <input type="hidden" name="id_lop" value="' . $row['id_lop'] . '">
                        <button type="submit" name="dangky" class="btn btn-info">Đăng Ký</button>
                    </form></td> ';
                  }
                }
              } else {
                echo '<b>Không tìm thấy dữ liệu</b>';
              }
            } else {
                $id = $data_user['id'];
              $sql = "SELECT * FROM `lop_hoc` 
              JOIN nien_khoa On nien_khoa.id_nk=lop_hoc.Khoa 
              JOIN trang_thai_lop ON trang_thai_lop.id_ttl=lop_hoc.trangthailop
              JOIN mon_hoc On mon_hoc.id_mon=lop_hoc.id_mh
              LEFT JOIN ca_hoc On ca_hoc.id_ca=lop_hoc.id_cahoc
              LEFT JOIN bo_mon On bo_mon.id_bo_mon=mon_hoc.id_mon
              Join register On lop_hoc.id_gv=register.id
              JOIN phong_hoc On phong_hoc.id_phong=lop_hoc.id_phonghoc
              WHERE trangthailop IN (1,2,3) AND nien_khoa.trangthai_nk=4 
              AND lop_hoc.id_lop Not in (SELECT chi_tiet_lop_hoc.id_lop FROM `chi_tiet_lop_hoc` WHERE chi_tiet_lop_hoc.id_hs=$id)";
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
                  <td> ' . $row['ten_ca'] . ': ' . $row['chitiet_ca'] . '</td>
                  <td> ' . $row['Phong'] . '</td>
                  <td> ' . number_format($row['hocphi']) . '</td> 
                  <td> ' . date("d-m-Y", strtotime($row['NgayChoDangKy'])) . ' Đến ' . date("d-m-Y", strtotime($row['HanDangKy'])) . '</td> 
                  <td> ' . date("d-m-Y", strtotime($row['NgayKhaiGiang'])) . '</td> 
                  <td> ' . date("d-m-Y", strtotime($row['NgayKetThuc'])) . '</td> 
                  <td> ' . $row['da_dk'] . '/' . $row['si_so'] . '</td>
                  <td> ' . $row['ten_ttl'] . '</td>  ';
                  if($row['trangthailop']==1){
                    echo '
                  <td> 
                    <form action="them_lop_hoc_dang_ky_code.php" method="POST">
                        <input type="hidden" name="MaLop" value="' . $row['MaLop'] . '">
                        <input type="hidden" name="id_hv" value="' . $id . '">
                        <input type="hidden" name="id_lop" value="' . $row['id_lop'] . '">
                        <button type="submit" disabled name="dangky" class="btn btn-info">Đăng Ký</button>
                    </form></td> ';
                  }else{
                    echo '
                  <td> 
                    <form action="them_lop_hoc_dang_ky_code.php" method="POST">
                        <input type="hidden" name="MaLop" value="' . $row['MaLop'] . '">
                        <input type="hidden" name="id_hv" value="' . $id . '">
                        <input type="hidden" name="id_lop" value="' . $row['id_lop'] . '">
                        <button type="submit" name="dangky" class="btn btn-info">Đăng Ký</button>
                    </form></td> ';
                  }
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