<!-- Add Button -->
<div class="modal fade" id="addadminprofile2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Lớp Thi Lại</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="quanlykhoa_thilai_code.php" method="POST">
        <div class="modal-body">
          <?php
          $sql = "SELECT * FROM mon_hoc";
          if ($db->num_rows($sql)) { {
          ?>
              <div class="form-group">
                <label> Môn Học </label>
                <select name="id_mh" class="form-control ">
                  <?php
                  foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  ?>
                    <option value="<?php echo $row['id_mon'] ?>"> <?php echo $row['ten_monhoc'] ?> </option>
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
                <label> Giảng Viên Chấm Thi </label>
                <select name="id_gv_cham" class="form-control ">
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
          <?php
          $sql = "SELECT * FROM `register` where usertype=5";
          if ($db->num_rows($sql)) { {
          ?>
              <div class="form-group">
                <label> Giảng Viên Gác Thi </label>
                <select name="id_gv" class="form-control ">
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
            <input type="text" name="MaLop" class="form-control" required>
          </div>
          <?php
          $sql = "SELECT * FROM `nien_khoa` where trangthai_nk=4";
          if ($db->num_rows($sql)) { {
          ?>
              <?php
              foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
              ?>
                <input type="hidden" name="Khoa" value="<?php echo $row['id_nk'] ?>" class="form-control" required>
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
          $sql = "SELECT * FROM `gio_thi` ";
          if ($db->num_rows($sql)) { {
          ?>
              <div class="form-group">
                <label> Giờ Thi </label>
                <select name="gio_thi" class="form-control ">
                  <?php
                  foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  ?>
                    <option value="<?php echo $row['id_giothi'] ?>"> <?php echo $row['gio_thi'];  ?></option>
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
          $sql = "SELECT * FROM `phong_hoc` ";
          if ($db->num_rows($sql)) { {
          ?>
              <div class="form-group">
                <label> Phòng Thi </label>
                <select name="id_phongthi" class="form-control ">
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
          <div class="form-group">
            <label>Ngày Thi</label>
            <input type="date" name="ngay_thi" class="form-control" required>
          </div>
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
          <button type="submit" name="molop_thilai" class="btn btn-primary">Lưu</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Quản Lý Khoá Thi Lại</h1>
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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile2">
        Thêm Khoá Thi Lại
      </button>      
      <form action="<?php echo $_DOMAIN . 'khoa_thilai' ?>" method="post">
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
              </select>&nbsp;&nbsp;&nbsp;
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
              $trang_thai_lop = $_POST['trang_thai_lop'];
              $ca_hoc = $_POST['ca_hoc'];
              $sql = "SELECT * from linh_vuc 
                            JOIN bo_mon On linh_vuc.id_lv=bo_mon.type_lv
                            JOIN mon_hoc ON mon_hoc.type=bo_mon.id_bo_mon
                            JOIN lop_hoc On lop_hoc.id_mh=mon_hoc.id_mon
                            JOIN nien_khoa On nien_khoa.id_nk=lop_hoc.Khoa 
                            JOIN trang_thai_lop ON trang_thai_lop.id_ttl=lop_hoc.trangthailop
                            LEFT JOIN ca_hoc On ca_hoc.id_ca=lop_hoc.id_cathi
                            LEFT JOIN phong_hoc On phong_hoc.id_phong=lop_hoc.id_phongthi
                            Left Join register On lop_hoc.id_gv_thi=register.id
                            LEFT JOIN gio_thi on gio_thi.id_giothi = lop_hoc.id_cathi
                      WHERE trangthailop in (14,15,16) AND nien_khoa.trangthai_nk=4 
              and (($bo_mon  and $trang_thai_lop and $lv
                   and $ca_hoc and MaLop like '%$search%') 
              or ($bo_mon  and $trang_thai_lop and $lv  
                   and $ca_hoc and register.username like '%$search%')
              or ($bo_mon  and $trang_thai_lop and $lv 
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
                  <td> ' . $row['ten_ttl'] . '</td>  ';
                  echo '
                  <td> 
                    <form action="' . $_DOMAIN . 'khoa_thilai_dshs" method="POST">
                      <input type="hidden" name="ds_id" value="' . $row['id_lop'] . '">
                      <button type="submit" name="ds_cv" class="btn btn-primary">Danh sách</button>
                    </form></br>
                    <form action="' . $_DOMAIN . 'khoa_thilai_edit" method="POST">
                    <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                    <button type="submit" name="edit_cv" class="btn btn-warning">Sửa Lịch</button>
                  </form></br> ';
                  if ($row['da_dk'] >= $row['si_so']) {
                    echo '<form action="' . $_DOMAIN . 'khoa_thilai_themhs" method="POST">
                      <input type="hidden" name="id_mh" value="' . $row['id_mh'] . '">
                      <input type="hidden" name="them_id" value="' . $row['id_lop'] . '">
                      <button type="submit" disabled name="them_cv" class="btn btn-info">Thêm HV</button>
                    </form> 
                  </td> ';
                  } else {
                    echo '<form action="' . $_DOMAIN . 'khoa_thilai_themhs" method="POST">
                      <input type="hidden" name="id_mh" value="' . $row['id_mh'] . '">
                      <input type="hidden" name="them_id" value="' . $row['id_lop'] . '">
                      <button type="submit"  name="them_cv" class="btn btn-info">Thêm HV</button>
                    </form> 
                  </td> ';
                  }
                  echo '<td> 
                  <form action="' . $_DOMAIN . 'khoa_thilai_edit_tt" method="POST">
                    <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                    <button type="submit" name="edit_cv" class="btn btn-success">Sửa</button>
                  </form></br>
                  <form action="quanlykhoa_thilai_code.php" method="POST">
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
              LEFT JOIN ca_hoc On ca_hoc.id_ca=lop_hoc.id_cathi
              LEFT JOIN phong_hoc On phong_hoc.id_phong=lop_hoc.id_phongthi
              Left JOIN bo_mon On bo_mon.id_bo_mon=mon_hoc.id_mon
              Left Join register On lop_hoc.id_gv_thi=register.id
              LEFT JOIN gio_thi on gio_thi.id_giothi = lop_hoc.id_cathi
              WHERE trangthailop in (14,15,16) AND nien_khoa.trangthai_nk=4";
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
                  <td> ' . $row['ten_ttl'] . '</td>  ';
                  echo '
                  <td> 
                    <form action="' . $_DOMAIN . 'khoa_thilai_dshs" method="POST">
                      <input type="hidden" name="ds_id" value="' . $row['id_lop'] . '">
                      <button type="submit" name="ds_cv" class="btn btn-primary">Danh sách</button>
                    </form></br>
                    <form action="' . $_DOMAIN . 'khoa_thilai_edit" method="POST">
                    <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                    <button type="submit" name="edit_cv" class="btn btn-warning">Sửa Lịch</button>
                  </form></br> ';
                  if ($row['da_dk'] >= $row['si_so']) {
                    echo '<form action="' . $_DOMAIN . 'khoa_thilai_themhs" method="POST">
                      <input type="hidden" name="id_mh" value="' . $row['id_mh'] . '">
                      <input type="hidden" name="them_id" value="' . $row['id_lop'] . '">
                      <button type="submit" disabled name="them_cv" class="btn btn-info">Thêm HV</button>
                    </form> 
                  </td> ';
                  } else {
                    echo '<form action="' . $_DOMAIN . 'khoa_thilai_themhs" method="POST">
                      <input type="hidden" name="id_mh" value="' . $row['id_mh'] . '">
                      <input type="hidden" name="them_id" value="' . $row['id_lop'] . '">
                      <button type="submit"  name="them_cv" class="btn btn-info">Thêm HV</button>
                    </form> 
                  </td> ';
                  }
                  echo '<td> 
                  <form action="' . $_DOMAIN . 'khoa_thilai_edit_tt" method="POST">
                    <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                    <button type="submit" name="edit_cv" class="btn btn-success">Sửa</button>
                  </form></br>
                  <form action="quanlykhoa_thilai_code.php" method="POST">
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