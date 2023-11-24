<div class="container-fluid">
    <!--DataTables -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông Báo Nội Bộ</h6>
        </div>
        <div class="card-body">
            <?php
            if (isset($_POST['edit_btn'])) {
                $id = $_POST['edit_id'];
                $sql = "SELECT * FROM `thong_bao_nb` 
                LEFT JOIN register On register.id=thong_bao_nb.id_nv_tb 
                JOIN loai_tb On loai_tb.id_loai_tb=thong_bao_nb.loai_tbnb where id_tbnb = '$id' ";
                if ($db->num_rows($sql)) {
                    $serial_number = 0;
                    foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                        echo '<form action="thongbao_noibo_code.php" method="POST">
						<input type="hidden" name="edit_id" value="' . $row['id_tbnb'] . '">
						<div class="form-group">
							<label> Tựa Đề </label>
							<input type="text" name="tua_de" value="' . $row['tua_de'] . '" class="form-control">
						</div>
                        <div class="form-group">
							<label> Nội Dung </label>
                            <textarea class="form-control" id="editor1" name="nd" rows="4" cols="50" required>' . $row['noi_dung'] . '</textarea>
						</div>
                        <div class="form-group">
							<label> Ngày Thông Báo </label>
							<input type="text" readonly name="edit_ttl" value="' . date("d-m-Y", strtotime($row['ngay_tbnb'])) . '" class="form-control">
						</div>
                        <div class="form-group">
							<label> Loại Thông Báo </label>
							<input type="text" readonly name="edit_ttl" value="' . $row['ten_loai_tb'] . '" class="form-control">
						</div>
                        <div class="form-group">
							<label> Người Nhận </label>
							<input type="text" readonly name="edit_ttl" value="' . $row['ten_nv_nhan'] . '" class="form-control">
						</div>
                        <div class="form-group">
							<label> Người Gửi </label>
							<input type="text" readonly name="edit_ttl" value="' . $row['username'] . '" class="form-control">
						</div>
						<button type="submit" name="update_cv" class="btn btn-primary"> Thay Đổi</button>
						<a href="' . $_DOMAIN . 'thongbao_noibo" class="btn btn-danger"> Hủy </a>
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