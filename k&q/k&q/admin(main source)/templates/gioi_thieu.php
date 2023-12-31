<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Thông Tin Giới Thiệu Trang Web</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
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
          <thead align="center">
            <tr>
              <th>STT</th>
              <th>Content </th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM gioi_thieu";
            if ($db->num_rows($sql)) {
              $serial_number = 0;
              foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                $serial_number++;
            ?>
                <tr>
                  <td> <?php echo $serial_number; ?></td>
                  <td> <?php echo $row['Content']; ?></td>

                  <td>
                    <form action="<?php echo '' . $_DOMAIN . 'gioithieu_edit'; ?>" method="POST">
                      <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="edit_btn" class="btn btn-success"> Sửa</button>
                    </form>
                  </td>

                </tr>
            <?php
              }
            }
            // 
            ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>