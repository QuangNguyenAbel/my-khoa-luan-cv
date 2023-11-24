<div class="container-fluid">
  <!--DataTables -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

      <?php
      if (isset($_POST['nhap_diem'])) {
        $id = $_POST['id_lop'];
        $ma = $_POST['ma_lop'];
        echo '<h6 class="m-0 font-weight-bold text-primary">Nhập Điểm Lớp ' . $ma . '</h6>
        </div>
        <div class="card-body">
        <form action="hoc_sinh_code.php" method="POST">
              <input type="hidden" name="id_lop" value="' . $id . '">
              <div class="form-group">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tr>
                <th><b>Tên Học Viên</b></th>
                <th><b>Mã Học Viên</b></th>
                <th><b>Điểm</b></th>
              </tr>';
        $sql = "SELECT * FROM `lop_hoc` 
				JOIN chi_tiet_lop_hoc On chi_tiet_lop_hoc.id_lop=lop_hoc.id_lop
        JOIN register on register.id=chi_tiet_lop_hoc.id_hs
				WHERE chi_tiet_lop_hoc.id_lop = '$id' ";
        if ($db->num_rows($sql)) {
          foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
      ?>
      
            <tr>
              <td>
                <input type="hidden" name="id_hv[]" value="<?php echo $row['id'] ?>">
                <p><?php echo $row['username'] ?> </p>
              </td>
              <td>
                <p><?php echo $row['user_code'] ?></p>
              </td>
              <td>
                <input type="text" name="diem[]" value="<?php echo $row['diem'] ?>" class="form-control" id="edit_Diem" onblur="myFunction()"> 
              </td>
            </tr>
            <b id="tinhtrang" style="color: red"></b>
            <script>
              function myFunction() {
                var x, text;
                // Get the value of the input field with id="numb"
                x = document.getElementById("edit_Diem").value;
                // If x is Not a Number or less than one or greater than 10
                if (isNaN(x) || x < 1 || x > 10) {
                  text = "Điểm không hợp lệ!";
                  document.getElementById("nhap_diem").disabled = true;
                } else {
                  text = "Điểm hợp lệ!";
                  document.getElementById("nhap_diem").disabled = false;
                }
                document.getElementById("tinhtrang").innerHTML = text;
              }
            </script>
      <?php
          }
        }
        echo '
      </table>
        
        <br>
        <div class="card-footer"><button type="submit" name="nhap_diem" class="btn btn-primary"> Thay Đổi</button>
        <a href="' . $_DOMAIN . 'lophoc" class="btn btn-danger"> Hủy </a>
      </form></div>
';
      }
      ?>
    </div>



  </div>
</div>
</div>
<?php

?>