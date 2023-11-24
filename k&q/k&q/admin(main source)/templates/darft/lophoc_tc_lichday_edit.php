<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa Lịch Dạy</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['edit_btn'])) {
				$id = $_POST['edit_id'];
				$sql = "SELECT * FROM lich_hoc WHERE id = '$id' ";
				if ($db->num_rows($sql)) {
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
						echo '
						<form action="lich_day_code.php" method="POST" enctype=multipart/form-data>
						<input type="hidden" name="edit_id" readonly value="' . $row['id'] . '">
						<div class="form-group">
							<label> Ghi Chú </label>
							<input type="text" name="edit_ghichu" value="' . $row['GhiChu'] . '" class="form-control" required>
						</div>
						<button type="submit" name="update_btn" class="btn btn-primary"> Thay Đổi</button>
						<a href="' . $_DOMAIN . 'lophoc_gv" class="btn btn-danger"> Hủy </a>
					</form>
						';
					}
				}
			}
			?>
		</div>
	</div>
</div>