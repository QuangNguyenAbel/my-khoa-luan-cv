<!-- Add Button -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Quản Lý Thông Tin Web</h1>
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
              <th>Logo </th>
              <th>Giờ Làm</th>
              <th>Facebook</th>
              <th>Youtube</th>
              <th>Hotline</th>
              <th>Liên Hệ</th>
              <th style="display: none">Mã Nhân Viên</th>
              <th>EDIT </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM thongtin_web";
            if ($db->num_rows($sql)) {
              $serial_number = 0;
              foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                $serial_number++;
            ?>
                <tr>
                  <th><?php echo $serial_number; ?> </th>
                  <td>
                    <?php echo '<img src="anh_nhan_vien/' . $row['logo'] . '" width="100px;" height="100px" alt="Image">' ?></td>
                  <td> <?php echo $row['GioLam']; ?></td>
                  <td> <?php echo $row['Facebook']; ?></td>
                  <td> <?php echo $row['Youtube']; ?></td>
                  <td> <?php echo $row['Hotline']; ?></td>
                  <td> <?php echo $row['Lienhe']; ?></td>
                  <td style="display: none"> <?php echo $row['MaNhanVien']; ?></td>
                  <td>
                    <form action="<?php echo '' . $_DOMAIN . 'thongtin_edit'; ?>" method="POST">
                      <input type="hidden" name="edit_id" value="<?php echo $row['stt']; ?>">
                      <button type="submit" name="edit_btn" class="btn btn-success"> Sửa</button>
                    </form>
                  </td>
                </tr>
            <?php
              }
            } else {
              echo "Không có bản ghi nào";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>