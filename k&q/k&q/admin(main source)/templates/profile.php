<style>
  .button {
    background-color: #4CAF50;
    /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
  }
  .button {
    background-color: white;
    color: black;
    border: 2px solid #555555;
  }
  .button:hover {
    background-color: #555555;
    color: white;
  }
</style>
<hr>
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
<div class="container-fluid">
  <h class="h3 mb-2 text-gray-800">Thông Tin Cá Nhân</h>
  <br><br><br>
  <?php
  $id = $data_user['id'];
  $sql = "SELECT * FROM register  
					  WHERE id = '$id'";
  if ($db->num_rows($sql)) {
    $serial_number = 0;
    foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
      $serial_number++;
      echo '<div class="row">
        <div class="col-sm-3">
          <!--left col-->
          <br>
          <div class="text-center">
            <img src="anh_nhan_vien/' . $row['img'] . '" class="avatar img-circle img-thumbnail" alt="avatar">
            <form action="' . $_DOMAIN . 'doimatkhau" method="POST">
              <input type="hidden" name="edit_id" value="' . $row['id'] . '">
              <button type="submit" name="edit_cv" class="button"> Đổi Mật Khẩu </button>
            </form>
          </div></br><br>
        </div>
        <!--/col-3-->
        <div class="col-sm-9">
          <div class="tab-content">
            <div class="tab-pane active" id="home">
              <hr>
              <form class="form" action="##" method="post" id="registrationForm">
                <div class="form-group">
                  <div class="col-xs-6">
                    <label for="first_name">
                      <h4>Tên Đăng Nhập</h4>
                    </label>
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any." readonly value="' . $row['email'] . '">
                  </div>
                </div>
                <div class="col-xs-6">
                  <label for="first_name">
                    <h4>Họ Tên</h4>
                  </label>
                  <input type="text" class="form-control" name="ten" readonly value="' . $row['username'] . '" title="enter your first name if any.">
                </div>
            </div>';
            if($data_user['usertype']==6)
            {
              echo'<div class="form-group">
              <div class="col-xs-6">
                <label for="last_name">
                  <h4>Mã Học Viên</h4>
                </label>
                <input type="text" class="form-control" name="last_name" readonly value="' . $row['user_code'] . '">
              </div>
            </div>';
            }
            else
            {
              echo'<div class="form-group">
              <div class="col-xs-6">
                <label for="last_name">
                  <h4>Mã Nhân Viên</h4>
                </label>
                <input type="text" class="form-control" name="last_name" readonly value="' . $row['user_code'] . '">
              </div>
            </div>';
            }
            echo'<div class="form-group">
            <div class="col-xs-6">
              <label for="phone">
                <h4>Số Điện Thoại</h4>
              </label>
              <input type="text" class="form-control" name="phone" readonly value="' . $row['phone'] . '">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-6">
              <label for="mobile">
                <h4>Địa Chỉ</h4>
              </label>
              <input type="text" class="form-control" name="mobile" readonly value="' . $row['address'] . '">
            </div>
          </div>
          <div class="form-group">
          <div class="form-group">
            <div class="col-xs-6">
              <label>
                <h4>Ngày Sinh</h4>
              </label>
              <input type="ngay_sinh" class="form-control" readonly value="' . date("d-m-Y", strtotime($row['birth'])) . '">
            </div>
          </div>';
            
    }
  }
  ?>
  <div class="form-group">
  </div>
  </form>
  <hr>
</div>
<!--/tab-pane-->
</div>
<!--/tab-pane-->
</div>
<!--/tab-content-->
</div>
<!--/col-9-->
</div>
<!--/row-->