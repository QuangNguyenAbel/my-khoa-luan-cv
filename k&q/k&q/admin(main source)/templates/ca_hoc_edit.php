<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa Ca Học</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['edit_cv'])) {
				$id = $_POST['edit_id'];
				$sql = "SELECT * FROM ca_hoc WHERE id_ca = '$id' ";
				if ($db->num_rows($sql)) {
					$serial_number = 0;
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
						$serial_number++;
						echo '<form action="ca_hoc_code.php" method="POST">
						<input type="hidden" name="edit_id" value="' . $row['id_ca'] . '">
						<div class="form-group">
							<label> Tên Ca </label>
							<input type="text" name="edit_ca" value="' . $row['ten_ca'] . '" class="form-control">
						</div>
            <div class="form-group">
							<label> Chi Tiết Ca </label>
							<input type="text" name="edit_ct_ca" value="' . $row['chitiet_ca'] . '" class="form-control">
						</div>
						<button type="submit" name="update_cv" class="btn btn-primary"> Thay Đổi</button>
						<a href="' . $_DOMAIN . 'ca_hoc" class="btn btn-danger"> Hủy </a>
					</form>';
					}
				}
			}
			?>
		</div>
	</div>
</div>