 <style>
   th,
   td {
     text-align: center
   }
 </style>
 <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Thêm Phòng Học</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form action="phong_hoc_code.php" method="POST">
         <div class="modal-body">
           <div class="form-group">
             <label>Phòng</label>
             <input type="text" name="ma_phong" class="form-control" required>
           </div>
           <div class="form-group">
             <label>Sức Chứa</label>
             <input type="text" name="suc_chua" class="form-control" required>
           </div>
           <div class="form-group">
             <label> Tình Trạng Phòng </label>
             <select name="ttp" class="form-control ">
               <?php
                $sql = "SELECT * FROM tinh_trang_phong";
                if ($db->num_rows($sql) >= 1) {
                  foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                    echo '<option value="' . $row['id_ttp'] . ' " > ' . $row['TinhTrangPhong'] . '  </option>';
                  }
                }
                ?>
             </select>
           </div>
         </div>
         <div class="modal-footer">
           <button type="submit" name="add_phong" class="btn btn-primary">Lưu</button>
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
         </div>
       </form>
     </div>
   </div>
 </div>
 <div class="container-fluid">
   <h1 class="h3 mb-2 text-gray-800">Quản Lý Phòng Học</h1>
   <!-- DataTales Example-->
   <div class="card shadow mb-4">
     <div class="card-header py-3">
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
         Thêm phòng học
       </button>
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
         <?php
          $sql = "SELECT * FROM `phong_hoc` JOIN tinh_trang_phong on phong_hoc.id_ttp = tinh_trang_phong.id_ttp";
          ?>
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <thead>
             <tr>
               <th style="text-align: center">STT </th>
               <th style="text-align: center">Phòng </th>
               <th style="text-align: center">Sức Chứa</th>
               <th style="text-align: center">Tình Trạng</th>
               <th> </th>
               <th></th>
               <th> </th>
               <th></th>
               <th></th>
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
                   <td> <?php echo $row['Phong']; ?></td>
                   <td> <?php echo $row['suc_chua']; ?></td>
                   <td> <?php echo $row['TinhTrangPhong']; ?></td>
                   <td>
                     <form action="<?php echo '' . $_DOMAIN . 'phonghoc_lichkhoahoc'; ?>" method="POST">
                       <input type="hidden" name="edit_id" value="<?php echo $row['id_phong']; ?>">
                       <input type="hidden" name="phong" value="<?php echo $row['Phong']; ?>">
                       <button type="submit" name="submit" class="btn btn-secondary">Xem Lịch Khoá Học</button>
                     </form> 
                   </td>
                   <td>
                     <form action="<?php echo '' . $_DOMAIN . 'phonghoc_lichhoc'; ?>" method="POST">
                     <input type="hidden" name="phong" value="<?php echo $row['Phong']; ?>">
                       <input type="hidden" name="edit_id" value="<?php echo $row['id_phong']; ?>">
                       <button type="submit" name="submit" class="btn btn-info">Xem Lịch Học</button>
                     </form> 
                   </td>
                   <td>
                     <form action="<?php echo '' . $_DOMAIN . 'phonghoc_lichthi'; ?>" method="POST">
                     <input type="hidden" name="phong" value="<?php echo $row['Phong']; ?>">
                       <input type="hidden" name="edit_id" value="<?php echo $row['id_phong']; ?>">
                       <button type="submit" name="submit" class="btn btn-warning">Xem Lịch Thi</button>
                     </form>
                   </td>
                   <td>
                     <form action="<?php echo '' . $_DOMAIN . 'phonghoc_edit'; ?>" method="POST">
                       <input type="hidden" name="edit_id" value="<?php echo $row['id_phong']; ?>">
                       <button type="submit" name="edit_cv" class="btn btn-success">Sửa</button>
                     </form>
                   </td>
                   <td>
                     <form action="phong_hoc_code.php" method="POST">
                       <input type="hidden" name="delete_id" value="<?php echo $row['id_phong']; ?>">
                       <button type="submit" name="delete_cv" class="btn btn-danger">Xóa</button>
                     </form>
                   </td>
                 </tr>
             <?php
                }
              } else {
                echo "No record found";
              }
              ?>
           </tbody>
         </table>
       </div>
     </div>
   </div>
   <td>