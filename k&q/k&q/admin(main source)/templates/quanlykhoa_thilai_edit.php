<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa Khoá Học</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['edit_cv'])) {
				$id = $_POST['edit_id'];
				$sql = "SELECT * FROM `lop_hoc` 
                JOIN nien_khoa On nien_khoa.id_nk=lop_hoc.Khoa 
                JOIN trang_thai_lop ON trang_thai_lop.id_ttl=lop_hoc.trangthailop
                JOIN mon_hoc On mon_hoc.id_mon=lop_hoc.id_mh
                LEFT JOIN ca_hoc On ca_hoc.id_ca=lop_hoc.id_cathi
                LEFT JOIN phong_hoc On phong_hoc.id_phong=lop_hoc.id_phongthi
                Left JOIN bo_mon On bo_mon.id_bo_mon=mon_hoc.id_mon
                Left Join register On lop_hoc.id_gv_thi=register.id
                LEFT JOIN gio_thi on gio_thi.id_giothi = lop_hoc.id_cathi
				WHERE id_lop = '$id' ";
				if ($db->num_rows($sql)) {
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
						$username = $row['username'];
						$id_gv = $row['id'];
						$trangthailop = $row['trangthailop'];
						$ten_ttl = $row['ten_ttl'];
						$id_mh = $row['id_mh'];
						$ten_monhoc = $row['ten_monhoc'];
						$id_cathi = $row['id_cathi'];
						$gio_thi = $row['gio_thi'];
						$chitiet_ca = $row['chitiet_ca'];
						$id_phongthi = $row['id_phongthi'];
						$Phong = $row['Phong'];
						$suc_chua = $row['suc_chua'];
						$si_so = $row['si_so'];
                        $ngay_thi = $row['ngay_thi'];
			?>
						<form action="quanlykhoa_thilai_code.php" method="POST">
							<input type="hidden" name="edit_id" value="<?php echo $row['id_lop'] ?>">
							<div class="form-group">
								<label> Mã Lớp </label>
								<input type="text"  name="MaLop" value="<?php echo $row['MaLop'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label> Ngày Thi </label>
								<input type="date"  name="ngay_thi" value="<?php echo $row['ngay_thi'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label> Giờ Thi </label>
								<select name="gio_thi" class="form-control ">
									<option hidden value="<?php echo $id_cathi ?>"><?php echo $gio_thi ?> </option>
									<?php
									$sql = "SELECT * FROM gio_thi ";
									if ($db->num_rows($sql)) { {
											foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
									?>
												<option value="<?php echo $row['id_giothi'] ?>"> <?php echo $row['gio_thi'] ?> </option>
									<?php
											}
										}
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label> Phòng Thi </label>
								<select name="id_phongthi" class="form-control ">
									<option hidden value="<?php echo $id_phongthi ?>"><?php echo $Phong ?> </option>
									<?php
									$sql = "SELECT * FROM phong_hoc";
									if ($db->num_rows($sql)) { {
											foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
									?>
												<option value="<?php echo $row['id_phong'] ?>"> <?php echo $row['Phong'] ?> </option>
									<?php
											}
										}
									}
									?>
								</select>
							</div>
                            <div class="form-group">
								<label> Giảng Viên Gác Thi </label>
								<select name="id_gv" class="form-control ">
									<option hidden value="<?php echo $id_gv ?>"><?php echo $username ?> </option>
									<?php
									$sql = "SELECT * from register where usertype=5";
									if ($db->num_rows($sql)) { {
											foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
									?>
												<option value="<?php echo $row['id'] ?>"> <?php echo $row['username'] ?> </option>
									<?php
											}
										}
									}
									?>
								</select>
							</div>
							<button type="submit" name="update_lichthi" class="btn btn-primary"> Thay Đổi</button>
							<a href="<?php echo '' . $_DOMAIN . 'khoa_thilai'; ?>" class="btn btn-danger"> Hủy </a>
						</form>
			<?php
					}
				}
			}
			?>
		</div>
	</div>
</div>