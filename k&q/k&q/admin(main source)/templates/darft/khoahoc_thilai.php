<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Mở Lớp Thi Lại</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-12">
      <?php
      if ($data_user['usertype'] == 2) {
        $sql = "SELECT switch FROM `bat_tat_thilai` limit 1";
              if ($db->num_rows($sql)) {
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                    $sw=$row['switch'];
                    if($sw==0){
                        echo '<form action="khoahoc_thilai_code.php" method="POST">
                          <button type="submit" name="cho" class="btn btn-success"> Mở Đăng Ký Thi Lại </button>
                        </form>';
                    }
                    else{
                        echo '<form action="khoahoc_thilai_code.php" method="POST">
                          <button type="submit" name="ko_cho" class="btn btn-danger"> Khoá Đăng Ký Thi Lại </button>
                        </form>';
                    }
                }
            }
      }
      ?>

      <form action="<?php echo $_DOMAIN . 'monhoc' ?>" method="post">
        <div class="">
          <div id="dataTable_filter" class="dataTables_filter">
            <label for="search">Tìm kiếm
              <input type="text" name="search" id="search_text" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
            </label>&nbsp;
            <label>Môn Học</label>
            <select style="border-radius: 5px; border-style:ridge" name="bomon">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT * FROM bo_mon ";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  echo '
                                <option value="type=' . $row['id_bo_mon'] . ' " > ' . $row['ten_bomon'] . '  </option>
                                        ';
                }
              }
              ?>
            </select>&nbsp;
            <label>Học Phí</label>
            <select style="border-radius: 5px; border-style:ridge" name="hocphi">
              <option value="1">Tất Cả</option>
              <?php
              $sql = "SELECT distinct hocphi FROM mon_hoc ";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  echo '
                                <option value="hocphi=' . $row['hocphi'] . ' " > ' . number_format($row['hocphi']) . '  </option>
                                        ';
                }
              }
              ?>
            </select>&nbsp;
            <label><i class="fa fa-sort"></i></label>
            <select style="border-radius: 5px; border-style:ridge" name="tt">
              <option value="ORDER By id_mon ASC">Tăng Dần</option>
              <option value="ORDER By id_mon DESC">Giảm Dần</option>
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
              <th>STT </th>
              <th>Tên Môn Học</th>
              <th>Bộ Môn</th>
              <th>Học Phí</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['submit'])) {
              $a = $_POST['bomon'];
              $search = $_POST['search'];
              $tt = $_POST['tt'];
              $hocphi = $_POST['hocphi'];
              $sql = "SELECT * FROM `mon_hoc` JOIN bo_mon ON mon_hoc.type=bo_mon.id_bo_mon
               where $a and $hocphi and ten_monhoc like '%$search%' $tt";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
                  echo '
                <tr>
                <td> ' . $serial_number . '</td>
                <td> ' . $row['ten_monhoc'] . '</td>
                <td> ' . $row['ten_bomon'] . '</td>
                <td> ' . number_format($row['hocphi']) . '</td>
                <td>
                  <form action="' . $_DOMAIN . 'khoahoc_thilai_ds" method="POST">
                    <input type="hidden" name="id_mon" value="' . $row['id_mon'] . '">
                    <button type="submit" name="xemds" class="btn btn-primary "> Xem Danh sách </button>
                  </form>
                </td>
                </tr>
		';
                }
              }
              else {
                echo '<b>Không tìm thấy dữ liệu</b>';
              }
            } else {
              $sql = "SELECT * FROM `mon_hoc` JOIN bo_mon ON mon_hoc.type=bo_mon.id_bo_mon";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
                  echo '
                <tr>
                  <td> ' . $serial_number . '</td>
                  <td> ' . $row['ten_monhoc'] . '</td>
                  <td> ' . $row['ten_bomon'] . '</td>
                  <td> ' . number_format($row['hocphi']) . '</td>
                  <td>
                  <form action="' . $_DOMAIN . 'khoahoc_thilai_ds" method="POST">
                    <input type="hidden" name="id_mon" value="' . $row['id_mon'] . '">
                    <button type="submit" name="xemds" class="btn btn-primary"> Xem Danh sách </button>
                  </form>
                </td>
                <td>
                  <form action="' . $_DOMAIN . 'khoahoc_thilai_ds_lop" method="POST">
                    <input type="hidden" name="id_mon" value="' . $row['id_mon'] . '">
                    <button type="submit" name="xemds_lop" class="btn btn-info"> Xem Danh sách Lớp</button>
                  </form>
                </td>
                </tr>
		';
                }
              }
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