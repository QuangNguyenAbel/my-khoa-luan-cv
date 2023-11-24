<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa Học Viên</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['thanhtoan'])) {
				$id = $_POST['edit_id'];
				$username = $_POST['username'];
				$user_code = $_POST['user_code'];
				$sql = "SELECT * FROM register
				WHERE id='$id'";
				if ($db->num_rows($sql)) {
					$serial_number = 0;
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
			?>
						<form action="khach_hang_kt_code.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="id_hv" value="<?php echo $row['id'] ?>">
							<input type="hidden" name="username" value="<?php echo $username ?>">
							<input type="hidden" name="user_code" value="<?php echo $user_code ?>">
							<input type="hidden" name="id_nv" value="<?php echo $data_user['id'] ?>">
							<input type="hidden" name="ten_nv" value="<?php echo $data_user['username'] ?>">
							<input type="hidden" name="ma_nv" value="<?php echo $data_user['user_code'] ?>">
							<input type="hidden" name="ngay_thang" value="<?php echo date("Y-m-d"); ?>" class="form-control" required>
							<div class="form-group">
								<label>Tên Học Viên</label>
								<input type="text" readonly name="ma_nhan_vien" value="<?php echo $row['username']; ?> " class="form-control">
							</div>
							<div class="form-group">
								<label>Mã Học Viên</label>
								<input type="text" readonly name="ten_nhan_vien" value="<?php echo $row['user_code'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Địa Chỉ</label>
								<input type="text" readonly name="dia_chi" value="<?php echo $row['address'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Số Điện Thoại</label>
								<input type="text" readonly name="sdt" value="<?php echo $row['phone'] ?>" class="form-control">
							</div>
							<div class="form-group" >
								<label>Email</label>
								<input type="text" readonly name="email" value="<?php echo $row['email'] ?>" class="form-control">
							</div>
							<div class="form-group" >
								<label>Ghi Chú</label>
								<input type="text" name="ghichu" value="" class="form-control">
							</div>
							<div class="form-group">
								<?php
								$gv = "	SELECT * from mon_hoc 
										JOIN lop_hoc ON lop_hoc.id_mh=mon_hoc.id_mon
										JOIN chi_tiet_lop_hoc on chi_tiet_lop_hoc.id_lop = lop_hoc.id_lop
										JOIN register On register.id=chi_tiet_lop_hoc.id_hs
										WHERE lop_hoc.trangthailop in (2,3) and id_hs='$id' and chi_tiet_lop_hoc.thanhtoan=0";
								if ($db->num_rows($gv)) {
									echo '<label> Lớp Học </label>
									';
									$serial_number = 0;
									foreach ($db->fetch_assoc($gv, 0) as $key => $row) {
										echo '<br>
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
									<tr>
										<th>
										<input type="checkbox"  name="id_lop[]" value="' . $row['id_lop'] . '" >' . $row['MaLop'] . '</input>
										</th>
										</tr>
										</thead>
										</table>
												';
									}
								} else {
									echo '
									
									<br><b style="color: red;"	>Học viên hiện tại chưa đăng ký lớp nào!</b><br>
									Hoặc tất cả lớp học học viên này đăng ký đều đã thanh toán!';
								}
								?>
							</div>
							<?php
							$gv = "SELECT * from mon_hoc 
							JOIN lop_hoc ON lop_hoc.id_mh=mon_hoc.id_mon
							JOIN chi_tiet_lop_hoc on chi_tiet_lop_hoc.id_lop = lop_hoc.id_lop
							JOIN register On register.id=chi_tiet_lop_hoc.id_hs
							WHERE lop_hoc.trangthailop in (2,3) and id_hs='$id' and chi_tiet_lop_hoc.thanhtoan=0";
							if ($db->num_rows($gv)) {
								echo '
								<button type="submit" name="thanhtoan" class="btn btn-primary"> Thanh Toán </button>';
							} 
							?>
							
							<a href="<?php echo '' . $_DOMAIN . 'thanhtoan_dshv'; ?>"  class="btn btn-danger"> Hủy </a>
						</form>
			<?php
					}
				}
			}
			?>
		</div>
	</div>
</div>