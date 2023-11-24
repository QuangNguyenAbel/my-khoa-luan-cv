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
      <a class="btn btn-info" href="<?php echo '' . $_DOMAIN . 'lophoc'; ?>">Quay Lại</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <input type="button" name="update" value="Update" onClick="setUpdateAction();" />
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
            <tr class="table-row">
              <th>
                <label for="select_all_checkboxes" class="visuallyhidden"></label>
                <input type="checkbox" id="select_all_checkboxes" />
              </th>
              <th>STT </th>
              <th>Họ Tên </th>
              <th>Mã Học Viên</th>
              <th>Số Điện Thoại </th>
              <th>Email</th>
              <th>Địa Chỉ</th>
              <th <?php if ($data_user['usertype'] == 5) {
                    echo 'hidden';
                  } ?>>Ngày Đăng Ký</th>
              <th <?php if ($data_user['usertype'] == 5) {
                    echo 'hidden';
                  } ?>>Thanh Toán</th>
              <th <?php if ($data_user['usertype'] == 5) {
                    echo 'hidden';
                  } ?>> </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM `register` 
              JOIN chi_tiet_lop_hoc on chi_tiet_lop_hoc.id_hs = register.id  
              Where id_lop ='97' order by username asc";
            if ($db->num_rows($sql)) {
              $serial_number = 0;
              foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                $i = 0;
                
                  if ($i % 2 == 0)
                    $classname = "evenRow";
                  else
                    $classname = "oddRow";
                  $serial_number++;
            ?>
                  <tr class="table-row">
                    <td>
                      <label for="ferranMessage" class="visuallyhidden"></label>
                      <input id="ferranMessage" type="checkbox" class="delete_checkbox" type="checkbox" name="users[]" v alue="<?php echo $row["id_hs"]; ?>">
                      </th>
                    </td>
                    <td> <?php echo $serial_number; ?></td>
                    <td><?php echo strip_tags($row['username']);  ?></td>
                    <td><?php echo $row['user_code']; ?></td>
                    <td> <?php echo strip_tags($row['phone']); ?></td>
                    <td> <?php echo strip_tags($row['email']); ?></td>
                    <td><?php echo strip_tags($row['address']); ?></td>
                    <td <?php if ($data_user['usertype'] == 5) {
                          echo 'hidden';
                        } ?>><?php echo date("d-m-Y", strtotime($row['ngaydk'])); ?></td>
                    <th <?php if ($data_user['usertype'] == 5) {
                          echo 'hidden';
                        } ?>><?php echo $row['thanhtoan']; ?></th>
                    <td <?php if ($data_user['usertype'] == 5) {
                          echo 'hidden';
                        } ?>>
                      <form action="lop_hoc_code.php" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>">
                        <input type="hidden" name="lop" value="<?php echo $id ?>">
                        <input type="hidden" name="id" value="<?php echo $row['id_lopdk'] ?>">
                        <button type="submit" name="delete_hv" class="btn btn-danger"> Xóa </button>
                      </form>
                    </td>
                    <input id="multiple_deletion" type="submit" class="submit-input" hidden value="Delete" />
                  </tr>
            <?php
                }
                $i++;
              }
            ?>
          </tbody>
        </table>
        <script src="selectallcheckboxes.js"></script>
      </div>
    </div>
  </div>
  <script>
    function setUpdateAction() {
      document.frmUser.action = "http://localhost:8080/k&q/admin/lophoc_ds_nhapdiem";
      document.frmUser.submit();
    }
  </script><?php echo '' . $_DOMAIN . 'lophoc_ds_nhapdiem'; ?>