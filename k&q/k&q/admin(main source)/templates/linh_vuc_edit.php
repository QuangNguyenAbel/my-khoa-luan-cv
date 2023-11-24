<div class="container-fluid">
    <!--DataTables -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Sửa Lĩnh Vực</h6>
        </div>
        <div class="card-body">
            <?php
            if (isset($_POST['edit_cv'])) {
                $id = $_POST['edit_id'];
                $sql = "select * from linh_vuc
				 WHERE id_lv = '$id' ";
                if ($db->num_rows($sql)) {
                    $serial_number = 0;
                    foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
            ?>
                        <form action="linh_vuc_code.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id_lv'] ?>">
                            <div class="form-group">
                                <label> Lĩnh Vực </label>
                                <input type="text" name="ten_lv" value="<?php echo $row['ten_lv'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Giới Thiệu</label>
                                <textarea class="form-control" id="editor1" name="gioithieu_lv" rows="4" cols="50" required>
                            <?php echo $row['gioithieu_lv'] ?></textarea>
                    <button type="submit" name="update_cv" class="btn btn-primary">Thay Đổi</button>
                    <a href="<?php echo '' . $_DOMAIN . 'linhvuc'; ?>" class="btn btn-danger"> Hủy </a>
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