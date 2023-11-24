<!-- Add Button -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Khoá Học</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="them_lop_hoc_dang_ky_code.php" method="POST">
        <div class="modal-body">
          <?php
          $sql = "SELECT * FROM mon_hoc";
          if ($db->num_rows($sql)) { {
          ?>
              <div class="form-group">
                <label> Môn Học </label>
                <select name="mh" class="form-control ">
                  <?php
                  foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  ?>
                    <option value="<?php echo $row['id_mon'] ?>"> <?php echo $row['ten_monhoc'] ?> - Số Buổi: <?php echo $row['so_buoi'] ?> </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
          <?php
            }
          } else {
            echo "Không có môn học";
          }
          ?>
          <?php
          $sql = "SELECT * FROM `register` where usertype=5";
          if ($db->num_rows($sql)) { {
          ?>
              <div class="form-group">
                <label> Giảng Viên </label>
                <select name="gv" class="form-control ">
                  <?php
                  foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  ?>
                    <option value="<?php echo $row['id'] ?>"> <?php echo $row['username'];  ?></option>
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
          <div class="form-group">
            <label>Mã lớp</label>
            <input type="text" name="ma_lop" class="form-control" required>
          </div>
          <?php
          $sql = "SELECT * FROM `nien_khoa` where trangthai_nk=4";
          if ($db->num_rows($sql)) { {
          ?>
              <?php
              foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
              ?>
                <input type="hidden" name="khoa" value="<?php echo $row['id_nk'] ?>" class="form-control" required>
              <?php
              }
              ?>
          <?php
            }
          } else {
            echo "No Data Available";
          }
          ?>
          <?php
          $sql = "SELECT * FROM `ca_hoc` ";
          if ($db->num_rows($sql)) { {
          ?>
              <div class="form-group">
                <label> Ca Học </label>
                <select name="ca_hoc" class="form-control ">
                  <?php
                  foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  ?>
                    <option value="<?php echo $row['id_ca'] ?>"> <?php echo $row['ten_ca'] . ': ' . $row['chitiet_ca'];  ?></option>
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
          <div class="form-group">
            <label>Số Buổi</label>
            <input type="text" name="so_bh" class="form-control" required>
          </div>
          <?php
          $sql = "SELECT * FROM `phong_hoc` ";
          if ($db->num_rows($sql)) { {
          ?>
              <div class="form-group">
                <label> Phòng Học </label>
                <select name="phong_hoc" class="form-control ">
                  <?php
                  foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  ?>
                    <option value="<?php echo $row['id_phong'] ?>"> <?php echo 'Phòng: ' . $row['Phong'] . ' - Sức chứa: ' . $row['suc_chua'];  ?></option>
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
          $sql = "SELECT distinct suc_chua FROM `phong_hoc` ";
          if ($db->num_rows($sql)) { {
          ?>
              <div class="form-group">
                <label> Số Lượng </label>
                <select name="so_luong" class="form-control ">
                  <?php
                  foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  ?>
                    <option value="<?php echo $row['suc_chua'] ?>"> <?php echo $row['suc_chua'];  ?></option>
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



        </div>
        <div class="modal-footer">
          <button type="submit" name="add_lhdk" class="btn btn-primary">Lưu</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Quản Lý Khoá Học</h1>
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
        Thêm Khoá Học
      </button>
      <form action="<?php echo $_DOMAIN . 'khoahoc' ?>" method="post">
        <div class="">
          <div id="dataTable_filter" class="dataTables_filter">
            <label for="search">Tìm kiếm
              <input type="text" name="search" id="search_text" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
            </label>&nbsp;
            <label>Lĩnh Vực</label>
            <select style="border-radius: 5px; border-style:ridge" name="lv">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT * FROM linh_vuc";
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
            
            <div>
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
              <th >STT </th>
              <th >Tên Môn Học </th>
              <th >Mã Lớp</th>
              <th >Niên Khoá </th>
              <th >Giảng Viên</th>
              <th >Lịch Học</th>
              <th >Số Buổi</th>
              <th >Phòng Học</th>
              <th >Học Phí</th>
              <th >Hạn Đăng Ký</th>
              <th >Ngày Khai Giảng</th>
              <th >Ngày Kết Thúc</th>
              <th >Số lượng</th>
              <th >Trạng thái</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['submit'])) {
              $search = $_POST['search'];
              $tt = $_POST['tt'];
              $lv = $_POST['lv'];
              $bo_mon = $_POST['bo_mon'];
              $hocphi = $_POST['hocphi'];
              $trang_thai_lop = $_POST['trang_thai_lop'];
              $si_so = $_POST['si_so'];
              $ca_hoc = $_POST['ca_hoc'];
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
              WHERE trangthailop IN (1,2,3) AND nien_khoa.trangthai_nk=4 
              and (($bo_mon and $hocphi and $trang_thai_lop and $lv
                  and $si_so and $ca_hoc and MaLop like '%$search%') 
              or ($bo_mon and $hocphi and $trang_thai_lop and $lv 
                  and $si_so and $ca_hoc and register.username like '%$search%')
              or ($bo_mon and $hocphi and $trang_thai_lop and $lv 
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
                  <td> ' . $row['so_bh'] . '</td>
                  <td> ' . $row['Phong'] . '</td>
                  <td> ' . number_format($row['hocphi']) . '</td> 
                  <td> ' . date("d-m-Y", strtotime($row['NgayChoDangKy'])) . ' Đến ' . date("d-m-Y", strtotime($row['HanDangKy'])) . '</td> 
                  <td> ' . date("d-m-Y", strtotime($row['NgayKhaiGiang'])) . '</td> 
                  <td> ' . date("d-m-Y", strtotime($row['NgayKetThuc'])) . '</td> 
                  <td> ' . $row['da_dk'] . '/' . $row['si_so'] . '</td>
                  <td> ' . $row['ten_ttl'] . '</td>  ';
                  echo '
                  <td> 
                  <form action="' . $_DOMAIN . 'khoahoc_dshs" method="POST">
                  <input type="hidden" name="ds_id" value="' . $row['id_lop'] . '">
                  <button type="submit" name="ds_cv" class="btn btn-primary">Danh sách</button>
                </form></br>
                    <form action="' . $_DOMAIN . 'khoahoc_edit" method="POST">
                    <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                    <button type="submit" name="edit_cv" class="btn btn-warning">Sửa Lịch</button>
                  </form></br> ';
                  if ($row['da_dk'] >= $row['si_so']) {
                    echo '<form action="' . $_DOMAIN . 'khoahoc_themhs" method="POST">
                      <input type="hidden" name="them_id" value="' . $row['id_lop'] . '">
                      <button type="submit" disabled name="them_cv" class="btn btn-info">Thêm HV</button>
                    </form> 
                  </td> ';
                  } else {
                    echo '<form action="' . $_DOMAIN . 'khoahoc_themhs" method="POST">
                      <input type="hidden" name="them_id" value="' . $row['id_lop'] . '">
                      <button type="submit"  name="them_cv" class="btn btn-info">Thêm HV</button>
                    </form> 
                  </td> ';
                  }
                  echo '<td> 
                  <form action="' . $_DOMAIN . 'khoahoc_edit_tt" method="POST">
                    <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                    <button type="submit" name="edit_cv" class="btn btn-success">Sửa</button>
                  </form></br>
                  <form action="them_lop_hoc_dang_ky_code.php" method="POST">
                    <input type="hidden" name="delete_id" value="' . $row['id_lop'] . '">
                    <button type="submit" name="delete_cv" class="btn btn-danger">Xóa</button>
                  </form>
                </td></tr>';
                }
              } else {
                echo '<b>Không tìm thấy dữ liệu</b>';
              }
            } else {
              $sql = "SELECT * FROM `lop_hoc` 
              JOIN nien_khoa On nien_khoa.id_nk=lop_hoc.Khoa 
              JOIN trang_thai_lop ON trang_thai_lop.id_ttl=lop_hoc.trangthailop
              JOIN mon_hoc On mon_hoc.id_mon=lop_hoc.id_mh
              LEFT JOIN ca_hoc On ca_hoc.id_ca=lop_hoc.id_cahoc
              LEFT JOIN bo_mon On bo_mon.id_bo_mon=mon_hoc.id_mon
              Join register On lop_hoc.id_gv=register.id
              JOIN phong_hoc On phong_hoc.id_phong=lop_hoc.id_phonghoc
              WHERE trangthailop IN (1,2,3) AND nien_khoa.trangthai_nk=4";
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
                  <td> ' . $row['so_bh'] . '</td>
                  <td> ' . $row['Phong'] . '</td>
                  <td> ' . number_format($row['hocphi']) . '</td> 
                  <td> ' . date("d-m-Y", strtotime($row['NgayChoDangKy'])) . ' Đến ' . date("d-m-Y", strtotime($row['HanDangKy'])) . '</td> 
                  <td> ' . date("d-m-Y", strtotime($row['NgayKhaiGiang'])) . '</td> 
                  <td> ' . date("d-m-Y", strtotime($row['NgayKetThuc'])) . '</td> 
                  <td> ' . $row['da_dk'] . '/' . $row['si_so'] . '</td>
                  <td> ' . $row['ten_ttl'] . '</td>  ';
                  echo '
                  <td> 
                    <form action="' . $_DOMAIN . 'khoahoc_dshs" method="POST">
                      <input type="hidden" name="ds_id" value="' . $row['id_lop'] . '">
                      <button type="submit" name="ds_cv" class="btn btn-primary">Danh sách</button>
                    </form></br>
                    <form action="' . $_DOMAIN . 'khoahoc_edit" method="POST">
                    <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                    <button type="submit" name="edit_cv" class="btn btn-warning">Sửa Lịch</button>
                  </form></br> ';
                  if ($row['da_dk'] >= $row['si_so']) {
                    echo '<form action="' . $_DOMAIN . 'khoahoc_themhs" method="POST">
                      <input type="hidden" name="them_id" value="' . $row['id_lop'] . '">
                      <button type="submit" disabled name="them_cv" class="btn btn-info">Thêm HV</button>
                    </form> 
                  </td> ';
                  } else {
                    echo '<form action="' . $_DOMAIN . 'khoahoc_themhs" method="POST">
                      <input type="hidden" name="them_id" value="' . $row['id_lop'] . '">
                      <button type="submit"  name="them_cv" class="btn btn-info">Thêm HV</button>
                    </form> 
                  </td> ';
                  }
                  echo '<td> 
                  <form action="' . $_DOMAIN . 'khoahoc_edit_tt" method="POST">
                    <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                    <button type="submit" name="edit_cv" class="btn btn-success">Sửa</button>
                  </form></br>
                  <form action="them_lop_hoc_dang_ky_code.php" method="POST">
                    <input type="hidden" name="delete_id" value="' . $row['id_lop'] . '">
                    <button type="submit" name="delete_cv" class="btn btn-danger">Xóa</button>
                  </form>
                </td></tr>';
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