<div class="container-fluid">
    <!--DataTables -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Sửa Môn Học</h6>
        </div>
        <div class="card-body">
            <?php
            if (isset($_POST['edit_cv'])) {
                $ten_bomon = $_POST['ten_bomon'];
                $id = $_POST['edit_id'];
                $sql = "select * from mon_hoc
				 WHERE id_mon = '$id' ";
                if ($db->num_rows($sql)) {
                    $serial_number = 0;
                    foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
            ?>
                        <form action="mon_hoc_code.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id_mon'] ?>">
                            <div class="form-group">
                                <label> Môn Học </label>
                                <input type="text" name="edit_mh" value="<?php echo $row['ten_monhoc'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Học Phí</label>
                                <input type="text" name="hocphi" value="<?php echo ($row['hocphi']) ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Số Buổi</label>
                                <input type="text" name="so_buoi" value="<?php echo $row['so_buoi'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Giới Thiệu</label>
                                <textarea class="form-control" id="editor1" name="gt_mh" rows="4" cols="50" required>
                            <?php echo $row['gt_mh'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label> Bộ Môn </label>
                                <select name="bo_mon" class="form-control ">
                                    <option hidden value="<?php echo $row['type'] ?>"><?php echo $ten_bomon ?> </option>
                                    <?php
                                    $sql = "SELECT * FROM bo_mon";
                                    if ($db->num_rows($sql)) { {
                                            foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                    ?>
                                                <option value="<?php echo $row['id_bo_mon'] ?>"> <?php echo $row['ten_bomon'] ?> </option>
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
                    <a href="<?php echo '' . $_DOMAIN . 'monhoc'; ?>" class="btn btn-danger"> Hủy </a>
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