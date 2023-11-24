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
                $ten_lv = $_POST['ten_lv'];
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
                            <div class="form-group">
                                <label>Giới Thiệu</label>
                                <textarea class="form-control" id="editor1" name="gt_bm" 
                                rows="4" cols="50" required><?php echo $row['gioithieu_bm'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label> Lĩnh Vực </label>
                                <select name="type_lv" class="form-control ">
                                    <option hidden value="<?php echo $row['type_lv'] ?>"><?php echo $ten_lv ?> </option>
                                    <?php
                                    $sql = "SELECT * FROM linh_vuc";
                                    if ($db->num_rows($sql)) { {
                                            foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                    ?>
                                                <option value="<?php echo $row['id_lv'] ?>"> <?php echo $row['ten_lv'] ?> </option>
                                            <?php
                                            }
                                            ?>
                                </select>
                            </div>
                    <?php
                                        }
                                    } else {
                                        echo "No Data Available";
                                    }
                    ?>
                            <button type="submit" name="update_cv" class="btn btn-primary">Thay Đổi</button>
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