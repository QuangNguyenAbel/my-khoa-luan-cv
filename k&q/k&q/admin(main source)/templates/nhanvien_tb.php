<div class="container-fluid">
    <!--DataTables -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông Báo Cá Nhân</h6>
        </div>
        <div class="card-body">
            <?php
            require_once 'core/init.php';
            if (isset($_POST['edit_btn'])) {
                $id = $_POST['edit_id'];
                $sql = "SELECT * FROM `register` WHERE id = '$id' ";
                if ($db->num_rows($sql)) {
                    $serial_number = 0;
                    foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                        echo '<form action="thongbao_noibo_code.php" method="POST">
						<div class="form-group">
							<label> Tựa Đề </label>
							<input type="text" name="tua_de" value="" class="form-control">
						</div>
                        <div class="form-group">
							<label> Nội Dung </label>
                            <textarea class="form-control" id="editor1" name="nd" rows="4" cols="50" required></textarea>
						</div>
							<input type="text" hidden name="loai_tb" value="2" class="form-control">
                        <div class="form-group">
							<label> Người Nhận </label>
						    <input type="hidden" name="id_nv_nhan" value="' . $row['id'] . '">
							<input type="text" readonly name="ten_nv_nhan" value="' . $row['username'] . '" class="form-control">
						</div>
							<input type="text" hidden name="ma_nhan_vien" value="' . $data_user['id']. '" class="form-control">
                            <input type="text" hidden name="loai" value="2" class="form-control">
						<button type="submit" name="add_tb" class="btn btn-primary"> Thay Đổi</button>
						<a href="' . $_DOMAIN . 'nhanvien" class="btn btn-danger"> Hủy </a>
					</form>';
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