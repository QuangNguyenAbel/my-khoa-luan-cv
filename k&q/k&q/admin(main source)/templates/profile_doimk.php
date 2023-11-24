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
<div class="container-fluid">
  <h class="h3 mb-2 text-gray-800">Đổi Mật Khẩu</h>
  <br><br><br>
  <?php
  if (isset($_POST['edit_cv'])) {
    $id = $_POST['edit_id'];
    $sql = "SELECT * FROM register WHERE id = '$id' ";
    if ($db->num_rows($sql)) {
      $serial_number = 0;
      foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
        $serial_number++;
        echo '
                <tr>
                  <div class="row">
        <div>
          <!--left col-->
        </div>
        <!--/col-3-->
        <div class="col-sm-12	">

          <div class="tab-content">
            <div class="tab-pane active" id="home">
              <hr>
              <form class="form" action="profile_doimk_code.php" method="post" id="registrationForm">
                <input type="hidden" name="id" value="' . $row['id'] . '">
                <div class="form-group">

                  <div class="col-xs-6" style="display: none">
                    <label for="password">
                      <h4>Mật Khẩu Cũ</h4>
                    </label>
                    <input type="text" class="form-control" name="password0" value="' . $row['password'] . '" title="enter your password.">
                  </div>
                </div>
            
            <div class="form-group">

              <div class="col-xs-6">
                <label for="password">
                  <h4>Mật Khẩu Cũ</h4>
                </label>
                <input type="password" class="form-control" name="password1" title="enter your password." required>
              </div>
            </div>
            <div class="form-group">

              <div class="col-xs-6">
                <label for="password">
                  <h4>Mật Khẩu Mới</h4>
                </label>
                <input type="password" class="form-control" name="password2" title="enter your password." required>
              </div>
            </div>
            <div class="form-group">

              <div class="col-xs-6">
                <label for="password2">
                  <h4>Nhập Lại Mật Khẩu Mới</h4>
                </label>
                <input type="password" class="form-control" name="password3" title="enter your password2." required>
              </div>
            </div>

		';
      }
    }
  }
  ?>
  <div class="form-group">
    <div class="col-xs-12">
      <br>
      <button class="btn btn-lg btn-success" name="doi_mk" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Đổi</button>
      <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
    </div>
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