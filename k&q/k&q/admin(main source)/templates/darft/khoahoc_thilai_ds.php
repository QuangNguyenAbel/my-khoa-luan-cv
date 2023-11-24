<!-- Add Button -->
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Danh Sách Học Viên Đăng Ký Thi Lại</h1>
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
  if (isset($_POST['xemds'])) {
    $id_mon = $_POST['id_mon'];
    $sql = "SELECT * FROM `chi_tiet_lop_hoc` 
  JOIN lop_hoc On lop_hoc.id_lop=chi_tiet_lop_hoc.id_lop
  JOIN mon_hoc On mon_hoc.id_mon=lop_hoc.id_mh
  JOIN register on register.id=chi_tiet_lop_hoc.id_hs
  WHERE chi_tiet_lop_hoc.thi_lai=1 and lop_hoc.id_mh=$id_mon order by MaLop asc";
    $dem = $db->num_rows($sql);
    echo 'Tổng số học sinh đăng ký thi lại:'.$dem.'</b>';
  }
  ?>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a class="btn btn-info" href="<?php echo '' . $_DOMAIN . 'khoahoc_thilai'; ?>">Quay Lại</a>
    </div>
    <div class="card-body">
      <form action="<?php echo '' . $_DOMAIN . 'khoahoc_thilai_molop'; ?>" method="post">
        <button type="submit" name="molop" class="btn btn-success"> Mở Lớp Thi Lại</button>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <div class="row">
              <form>
                <div class="col-sm-12 col-md-6">
                  <div id="dataTable_filter" class="dataTables_filter">
                  </div>
                  <br>
                </div>
              </form>
            </div>
            <thead align="center">
              <tr>
                <th>STT </th>
                <th>Họ Tên </th>
                <th>Mã Học Viên</th>
                <th>Lớp </th>
                <th>Trạng Thái</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($_POST['xemds'])) {
                $id_mon = $_POST['id_mon'];
                $sql = "SELECT * FROM `chi_tiet_lop_hoc` 
              JOIN lop_hoc On lop_hoc.id_lop=chi_tiet_lop_hoc.id_lop
              JOIN mon_hoc On mon_hoc.id_mon=lop_hoc.id_mh
              JOIN register on register.id=chi_tiet_lop_hoc.id_hs
              WHERE chi_tiet_lop_hoc.thi_lai=1 and lop_hoc.id_mh=$id_mon order by MaLop asc";
                $dem = $db->num_rows($sql);
                if ($db->num_rows($sql)) {
                  $serial_number = 0;
                  foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                    $serial_number++;
              ?>
                    <tr>
                      <input type="hidden" name="dem" value="<?php echo $dem;  ?>">
                      <input type="hidden" name="id_mon" value="<?php echo strip_tags($row['id_mh']);  ?>">
                      <input type="hidden" name="id_hs[]" value="<?php echo strip_tags($row['id_hs']);  ?>">
                      <td> <?php echo $serial_number; ?></td>
                      <th><?php echo strip_tags($row['username']);  ?></th>
                      <th><?php echo $row['user_code']; ?></th>
                      <td> <?php echo strip_tags($row['MaLop']); ?></td>
                      <td> <?php 
                      if($row['co_lop_thilai']==0){
                        echo'<b class="text-danger">Chưa có Lớp</b>';
                      }else{
                        echo'<b class="text-success">Đã có Lớp</b>';
                      }
                      ?></td>
                    </tr>
              <?php
                  }
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </form>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#search_text').keyup(function() {
        var search = $(this).val();
        $.ajax({
          url: 'khach_hang_code.php',
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