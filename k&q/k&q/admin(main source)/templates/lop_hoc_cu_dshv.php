<!-- Add Button -->
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Danh Sách Học Viên</h1>
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
      <a class="btn btn-info" href="<?php echo '' . $_DOMAIN . 'lophoc_cu'; ?>">Quay Lại</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <div class="row">
            <form action="" method="post">
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
              <th>Số Điện Thoại </th>
              <th>Email</th>
              <th>Địa Chỉ</th>
              <th>Ngày Đăng Ký</th>
              <th>Điểm </th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['ds_cv'])) {
              $id = $_POST['ds_id'];
              $sql = "SELECT * FROM `register` 
              JOIN chi_tiet_lop_hoc on chi_tiet_lop_hoc.id_hs = register.id  
              Where id_lop ='$id' and thanhtoan=1 order by username asc";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
            ?>
                  <tr>
                    <td> <?php echo $serial_number; ?></td>
                    <th><?php echo strip_tags($row['username']);  ?></th>
                    <th><?php echo $row['user_code']; ?></th>
                    <td> <?php echo strip_tags($row['phone']); ?></td>
                    <td> <?php echo strip_tags($row['email']); ?></td>
                    <th><?php echo strip_tags($row['address']); ?></th>
                    <td><?php echo date("d-m-Y", strtotime($row['ngaydk'])); ?></td>
                    <th style="color: green;font-weight:1000" ><?php echo $row['diem']; ?></th>
                  </tr>
            <?php
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