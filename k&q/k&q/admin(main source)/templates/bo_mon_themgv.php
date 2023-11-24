<div class="container-fluid">
    <!--DataTables -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Sửa Bộ Môn</h6>
        </div>
        <div class="card-body">
            <?php
            if (isset($_POST['edit_cv'])) {
                $id = $_POST['edit_id'];
                $sql = "select * from bo_mon
				 WHERE id_bo_mon = '$id' ";
                if ($db->num_rows($sql)) {
                    $serial_number = 0;
                    foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
            ?>
                        <form action="bo_mon_code.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id_bo_mon'] ?>">
                            <div class="form-group">
                                <label> Bộ Môn </label>
                                <input type="text" name="edit_bm" value="<?php echo $row['ten_bomon'] ?>" class="form-control">
                            </div>
                            <?php
                            $sql = "SELECT * FROM `register` 
							WHERE id not in 
							(SELECT ct_gv.id_gv from ct_gv 
							WHERE ct_gv.id_bo_mon = '$id') and register.usertype=5";
                            if ($db->num_rows($sql)) { {
                            ?>
                                    <div class="form-group">
                                        <label> Giảng Viên </label>
                                        <select name="gv" class="form-control ">
                                            <?php
                                            foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                            ?>
                                                <option value="<?php echo $row['id'] ?>"> <?php echo $row['username'] ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" name="add_gv" class="btn btn-primary">Thêm</button>
                            <?php
                                }
                            } else {
                                echo "<b>Tất Cả Giảng Viên Trong Trung Tâm Đều Đang Dạy Môn Này!</b> <br><br>";
                            }
                            ?>
                            <a href="<?php echo '' . $_DOMAIN . 'bo_mon'; ?>" class="btn btn-danger"> Hủy </a>
                        </form>
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace('editor1');
</script>