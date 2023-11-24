<!-- Add Button -->

<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Quản Lý Lớp Học</h1>
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
      <form action="<?php echo $_DOMAIN . 'lophoc' ?>" method="post">
        <div class="">
          <div id="dataTable_filter" class="dataTables_filter">
            <label for="search">Tìm kiếm
              <input type="text" name="search" id="search_text" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
            </label>&nbsp;
            <label>Lĩnh Vực</label>
            <select style="border-radius: 5px; border-style:ridge" name="lv">
              <option value="1">Tất Cả</option>
              <?php
              $id = $data_user['id'];
              if ($data_user['usertype'] == 5) {
                $sql = "SELECT * FROM `linh_vuc` 
                        Join bo_mon on linh_vuc.id_lv=bo_mon.type_lv
                        JOIN ct_gv on ct_gv.id_bo_mon=bo_mon.id_bo_mon 
                        JOIN register on register.id=ct_gv.id_gv
                where ct_gv.id_gv=$id";
              } else {
                $sql = "SELECT * FROM linh_vuc";
              }
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  echo '
                                <option value="bo_mon.type_lv=' . $row['id_lv'] . ' " > ' . $row['ten_lv'] . '  </option>
                                        ';
                }
              }
              ?>
            </select>&nbsp;
            <label>Bộ Môn</label>
            <select style="border-radius: 5px; border-style:ridge" name="bo_mon">
              <option value="1">Tất Cả</option>
              <?php
              $id = $data_user['id'];
              if ($data_user['usertype'] == 5) {
                $sql = "SELECT * FROM `bo_mon` 
                JOIN ct_gv on ct_gv.id_bo_mon=bo_mon.id_bo_mon 
                JOIN register on register.id=ct_gv.id_gv
                where ct_gv.id_gv=$id";
              } else {
                $sql = "SELECT * FROM bo_mon";
              }
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
              $sql = "SELECT * from trang_thai_lop WHERE id_ttl in (4,5,6,17)";
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
                $id = $data_user['id'];
                if ($data_user['usertype'] == 5) {
                  $sql = "SELECT * from ca_hoc 
                  JOIN lop_hoc on lop_hoc.id_cahoc=ca_hoc.id_ca 
                  JOIN register on register.id=lop_hoc.id_gv
                  where lop_hoc.id_gv=$id and lop_hoc.trangthailop = 4";
                } else {
                  $sql = "SELECT *  FROM `ca_hoc` ";
                }
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
              <th style="text-align: center">Số lượng</th>
              <th style="text-align: center">Trạng thái</th>
              <th <?php if ($data_user['usertype'] == 5) {
                    echo 'hidden';
                  } ?>></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $id = $data_user['id'];
            if (isset($_POST['submit'])) {
              $search = $_POST['search'];
              $lv = $_POST['lv'];
              $tt = $_POST['tt'];
              $bo_mon = $_POST['bo_mon'];
              $trang_thai_lop = $_POST['trang_thai_lop'];
              $si_so = $_POST['si_so'];
              $ca_hoc = $_POST['ca_hoc'];
              if ($data_user['usertype'] == 5) {
                $sql = "
              SELECT * from linh_vuc 
              JOIN bo_mon On linh_vuc.id_lv=bo_mon.type_lv
              JOIN mon_hoc ON mon_hoc.type=bo_mon.id_bo_mon
              JOIN lop_hoc On lop_hoc.id_mh=mon_hoc.id_mon
              JOIN nien_khoa On nien_khoa.id_nk=lop_hoc.Khoa 
              JOIN trang_thai_lop ON trang_thai_lop.id_ttl=lop_hoc.trangthailop
              LEFT JOIN ca_hoc On ca_hoc.id_ca=lop_hoc.id_cahoc
              LEFT JOIN phong_hoc On phong_hoc.id_phong=lop_hoc.id_phonghoc
              LEFT Join register On lop_hoc.id_gv=register.id
              WHERE trangthailop Not IN (1,2,3,7,14,15,16) and lop_hoc.id_gv=$id AND nien_khoa.trangthai_nk=4 
              and (($bo_mon and $trang_thai_lop and $lv 
                  and $si_so and $ca_hoc and MaLop like '%$search%') 
              or ($bo_mon and $trang_thai_lop and $lv   
                  and $si_so and $ca_hoc and register.username like '%$search%')
              or ($bo_mon and $trang_thai_lop and $lv  
                  and $si_so and $ca_hoc and mon_hoc.ten_monhoc like '%$search%')) $tt";
              } else {
                $sql = "SELECT * from linh_vuc 
                JOIN bo_mon On linh_vuc.id_lv=bo_mon.type_lv
                JOIN mon_hoc ON mon_hoc.type=bo_mon.id_bo_mon
                JOIN lop_hoc On lop_hoc.id_mh=mon_hoc.id_mon
                JOIN nien_khoa On nien_khoa.id_nk=lop_hoc.Khoa 
                JOIN trang_thai_lop ON trang_thai_lop.id_ttl=lop_hoc.trangthailop
                LEFT JOIN ca_hoc On ca_hoc.id_ca=lop_hoc.id_cahoc
                LEFT JOIN phong_hoc On phong_hoc.id_phong=lop_hoc.id_phonghoc
                LEFT Join register On lop_hoc.id_gv=register.id
              WHERE trangthailop Not IN (1,2,3,7,14,15,16) AND nien_khoa.trangthai_nk=4 
              and (($bo_mon and $trang_thai_lop and $lv   
                  and $si_so and $ca_hoc and MaLop like '%$search%') 
              or ($bo_mon and $trang_thai_lop and $lv  
                  and $si_so and $ca_hoc and register.username like '%$search%')
              or ($bo_mon and $trang_thai_lop and $lv   
                  and $si_so and $ca_hoc and mon_hoc.ten_monhoc like '%$search%')) $tt";
              }
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
                  <td> ' . $row['da_dk'] . '/' . $row['si_so'] . '</td>
                  <td> ' . $row['ten_ttl'] . '</td>  ';
                  if ($data_user['usertype'] == 5) {
                    echo '
                  <td>
                  <form action="' . $_DOMAIN . 'lophoc_lichhoc" method="POST">
                    <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                    <button type="submit" name="submit" class="btn btn-success">Lịch Học</button>
                  </form></br>
                  <form action="' . $_DOMAIN . 'lophoc_lichthi" method="POST">
                    <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                    <button type="submit" name="submit" class="btn btn-warning"> Lịch Thi</button>
                  </form></br>
                  <form action="' . $_DOMAIN . 'lophoc_ds_diemdanh" method="POST">
                    <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                    <input type="hidden" name="ma_lop" value="' . $row['MaLop'] . '">
                    <input type="hidden" name="so_bh" value="' . $row['so_bh'] . '">
                    <input type="hidden" name="ttl" value="' . $row['trangthailop'] . '">
                    <button type="submit" name="diem_danh" class="btn btn-secondary"> Điểm Danh </button>
                  </form></br>
                  </td>
                  <td> 
                    <form action="' . $_DOMAIN . 'lophoc_dshv" method="POST">
                      <input type="hidden" name="ds_id" value="' . $row['id_lop'] . '">
                      <button type="submit" name="ds_cv" class="btn btn-primary">Danh sách</button>
                    </form></br>
                    ';
                  } else {
                    echo '
                    <td>
                    <form action="' . $_DOMAIN . 'lophoc_lichhoc" method="POST">
                      <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                      <button type="submit" name="submit" class="btn btn-success">Lịch Học</button>
                    </form></br>
                    <form action="' . $_DOMAIN . 'lophoc_lichthi" method="POST">
                      <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                      <button type="submit" name="submit" class="btn btn-warning"> Lịch Thi</button>
                    </form></br>
                    </td>
                    <td> 
                      <form action="' . $_DOMAIN . 'lophoc_dshv" method="POST">
                        <input type="hidden" name="ds_id" value="' . $row['id_lop'] . '">
                        <button type="submit" name="ds_cv" class="btn btn-primary">Danh sách</button>
                      </form></br>
                      ';
                  }

                  if ($data_user['usertype'] == 5) {
                    echo '<form action="' . $_DOMAIN . 'lophoc_thongbao" method="POST">
                    <input type="hidden" name="them_id" value="' . $row['id_lop'] . '">
                    <button type="submit" name="them_cv" class="btn btn-info">Thông Báo</button>
                  </form> <br>
                  <form action="' . $_DOMAIN . 'lophoc_ds_nhapdiem" method="POST">
                    <input type="hidden" name="id_lop" value="' . $row['id_lop'] . '">
                    <input type="hidden" name="ma_lop" value="' . $row['MaLop'] . '">
                    <button type="submit" name="nhap_diem" class="btn btn-secondary">Nhập Điểm</button>
                  </form>';
                  }
                  if ($data_user['usertype'] != 5) {
                    echo '<td> 
                        <form action="' . $_DOMAIN . 'lophoc_edit_tt" method="POST">
                          <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                          <button type="submit" name="edit_cv" class="btn btn-success">Sửa</button>
                        </form></br>
                        <form action="lop_hoc_code.php" method="POST">
                          <input type="hidden" name="delete_id" value="' . $row['id_lop'] . '">
                          <button type="submit" name="delete_cv" class="btn btn-danger">Xóa</button>
                        </form>
                      </td></tr>';
                  }
                }
              } else {
                echo '<b>Không tìm thấy dữ liệu</b>';
              }
            } else {
              if ($data_user['usertype'] == 5) {
                $sql = "SELECT * FROM `lop_hoc` 
              JOIN nien_khoa On nien_khoa.id_nk=lop_hoc.Khoa 
              JOIN trang_thai_lop ON trang_thai_lop.id_ttl=lop_hoc.trangthailop
              JOIN mon_hoc On mon_hoc.id_mon=lop_hoc.id_mh
              LEFT JOIN ca_hoc On ca_hoc.id_ca=lop_hoc.id_cahoc
              LEFT JOIN bo_mon On bo_mon.id_bo_mon=mon_hoc.id_mon
              LEFT Join register On lop_hoc.id_gv=register.id
              LEFT JOIN phong_hoc On phong_hoc.id_phong=lop_hoc.id_phonghoc
              WHERE trangthailop Not IN (1,2,3,7,14,15,16) AND nien_khoa.trangthai_nk=4 and lop_hoc.id_gv='$id'";
              } else {
                $sql = "SELECT * FROM `lop_hoc` 
              JOIN nien_khoa On nien_khoa.id_nk=lop_hoc.Khoa 
              JOIN trang_thai_lop ON trang_thai_lop.id_ttl=lop_hoc.trangthailop
              JOIN mon_hoc On mon_hoc.id_mon=lop_hoc.id_mh
              LEFT JOIN ca_hoc On ca_hoc.id_ca=lop_hoc.id_cahoc
              LEFT JOIN bo_mon On bo_mon.id_bo_mon=mon_hoc.id_mon
              LEFT Join register On lop_hoc.id_gv=register.id
              LEFT JOIN phong_hoc On phong_hoc.id_phong=lop_hoc.id_phonghoc
              WHERE trangthailop Not IN (1,2,3,7,14,15,16) AND nien_khoa.trangthai_nk=4 order by id_lop desc";
              }

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
                  <td> ' . $row['da_dk'] . '/' . $row['si_so'] . '</td>
                  <td> ' . $row['ten_ttl'] . '</td>  ';
                  if ($data_user['usertype'] == 5) {
                    echo '
                  <td>
                  <form action="' . $_DOMAIN . 'lophoc_lichhoc" method="POST">
                    <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                    <button type="submit" name="submit" class="btn btn-success">Lịch Học</button>
                  </form></br>
                  <form action="' . $_DOMAIN . 'lophoc_lichthi" method="POST">
                    <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                    <button type="submit" name="submit" class="btn btn-warning"> Lịch Thi</button>
                  </form></br>
                  <form action="' . $_DOMAIN . 'lophoc_ds_diemdanh" method="POST">
                    <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                    <input type="hidden" name="so_bh" value="' . $row['so_bh'] . '">
                    <input type="hidden" name="ma_lop" value="' . $row['MaLop'] . '">
                    <input type="hidden" name="ttl" value="' . $row['trangthailop'] . '">
                    <button type="submit" name="diem_danh" class="btn btn-secondary"> Điểm Danh </button>
                  </form></br>
                  </td>
                  <td> 
                    <form action="' . $_DOMAIN . 'lophoc_dshv" method="POST">
                      <input type="hidden" name="ds_id" value="' . $row['id_lop'] . '">
                      <button type="submit" name="ds_cv" class="btn btn-primary">Danh sách</button>
                    </form>
                    ';
                  } else {
                    echo '
                    <td>
                    <form action="' . $_DOMAIN . 'lophoc_lichhoc" method="POST">
                      <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                      <button type="submit" name="submit" class="btn btn-success">Lịch Học</button>
                    </form></br>
                    <form action="' . $_DOMAIN . 'lophoc_lichthi" method="POST">
                      <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                      <button type="submit" name="submit" class="btn btn-warning"> Lịch Thi</button>
                    </form></br>
                    </td>
                    <td> 
                      <form action="' . $_DOMAIN . 'lophoc_dshv" method="POST">
                        <input type="hidden" name="ds_id" value="' . $row['id_lop'] . '">
                        <button type="submit" name="ds_cv" class="btn btn-primary">Danh sách</button>
                      </form></br>
                      ';
                  }
                  if ($data_user['usertype'] == 5) {
                    echo '</br><form action="' . $_DOMAIN . 'lophoc_thongbao" method="POST">
                      <input type="hidden" name="them_id" value="' . $row['id_lop'] . '">
                      <button type="submit" name="them_cv" class="btn btn-info">Thông Báo</button>
                    </form><br>
                    <form action="' . $_DOMAIN . 'lophoc_ds_nhapdiem" method="POST">
                    <input type="hidden" name="id_lop" value="' . $row['id_lop'] . '">
                    <input type="hidden" name="ma_lop" value="' . $row['MaLop'] . '">
                    <button type="submit" name="nhap_diem" class="btn btn-secondary">Nhập Điểm</button>
                  </form> ';
                  }
                  if ($data_user['usertype'] != 5) {
                    echo '<td> 
                      <form action="' . $_DOMAIN . 'lophoc_edit_tt" method="POST">
                        <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                        <button type="submit" name="edit_cv" class="btn btn-success">Sửa</button>
                      </form></br>
                      <form action="lop_hoc_code.php" method="POST">
                        <input type="hidden" name="delete_id" value="' . $row['id_lop'] . '">
                        <button type="submit" name="delete_cv" class="btn btn-danger">Xóa</button>
                      </form>
                    </td></tr>';
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