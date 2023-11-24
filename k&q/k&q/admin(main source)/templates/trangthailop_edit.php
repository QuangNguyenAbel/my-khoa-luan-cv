<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa Trạng thái Lớp</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['edit_cv'])) {
				$id = $_POST['edit_id'];
				$sql = "select * from trang_thai_lop WHERE id_ttl  = '$id' ";
				if ($db->num_rows($sql)) {
					$serial_number = 0;
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
						$serial_number++;
						echo '<form action="trangthailop_code.php" method="POST">
						<input type="hidden" name="edit_id" value="' . $row['id_ttl'] . '">
						<div class="form-group">
							<label> Tên Trạng Thái Lớp </label>
							<input type="text" name="edit_ttl" value="' . $row['ten_ttl'] . '" class="form-control">
						</div>
						<button type="submit" name="update_cv" class="btn btn-primary"> Thay Đổi</button>
						<a href="' . $_DOMAIN . 'trangthailop" class="btn btn-danger"> Hủy </a>
					</form>';
					}
				}
			}
			?>
		</div>
	</div>
</div>