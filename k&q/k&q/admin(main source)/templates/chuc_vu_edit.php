<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa Chức Vụ</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['edit_cv'])) {
				$id = $_POST['edit_id'];
				$sql = "SELECT * FROM chuc_vu WHERE id_cv = '$id' ";
				if ($db->num_rows($sql)) {
					$serial_number = 0;
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
						$serial_number++;
						echo '<form action="chuc_vu_code.php" method="POST">
						<input type="hidden" name="edit_id" value="' . $row['id_cv'] . '">
						<div class="form-group">
							<label> Chức Vụ </label>
							<input type="text" name="edit_chuc_vu" value="' . $row['TenChucVu'] . '" class="form-control">
						</div>
						<button type="submit" name="update_cv" class="btn btn-primary"> Thay Đổi</button>
						<a href="' . $_DOMAIN . 'chucvu" class="btn btn-danger"> Hủy </a>
					</form>';
					}
				}
			}
			?>
		</div>
	</div>
</div>