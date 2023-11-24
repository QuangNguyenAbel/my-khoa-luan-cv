<?php
       if (isset($_POST['edit_cv'])) {
        $id = $_POST['edit_id'];
        $ten_bomon = $_POST['ten_bomon'];
        $sql = "SELECT * FROM `ct_gv` 
        JOIN register ON register.id=ct_gv.id_gv 
        JOIN bo_mon On bo_mon.id_bo_mon=ct_gv.id_bo_mon WHERE ct_gv.id_bo_mon='$id'";
      ?>
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Danh Sách Giảng Viên Dạy Môn <?php echo $ten_bomon; ?></h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a class="btn btn-info" href="<?php echo '' . $_DOMAIN . 'bo_mon'; ?>">Quay Lại</a>
    </div>
    <div class="card-body">
      
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT </th>
              <th>Giảng viên </th>
              <th>Mã Nhân Sự </th>
              <th>Email </th>
              <th>Số Điện Thoại</th>
              <th>Địa Chỉ</th>
              <td></td>
            </tr>
          </thead>
          <tbody>
            <?php
           
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $serial_number++;
            ?>
                  <tr>
                    <td> <?php echo $serial_number; ?></td>
                    <td> <?php echo $row['username']; ?></td>
                    <td> <?php echo $row['user_code']; ?></td>
                    <td> <?php echo $row['email']; ?></td>
                    <td> <?php echo $row['phone']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td>
                    <form action="bo_mon_code.php" method="POST">
                      <input type="hidden" name="delete_id" value="<?php echo $row['id_ctgv']; ?>">
                      <button type="submit" name="delete_gv" class="btn btn-danger"> Xóa</button>
                    </form>
                  </td>
              <?php
                }
              }
              else{
                echo '<b>Không có giảng viên dạy môn học này</b>';
              }
            }
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>