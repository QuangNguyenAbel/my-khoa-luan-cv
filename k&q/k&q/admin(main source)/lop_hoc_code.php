<?php
require_once 'core/init.php';
//thêm lớp học
if (isset($_POST['add_lhdk'])) {
	$mh = trim(addslashes(htmlspecialchars($_POST['mh'])));
	$ma_lop = trim(addslashes(htmlspecialchars($_POST['ma_lop'])));
	$gv = trim(addslashes(htmlspecialchars($_POST['gv'])));
	$so_luong = trim(addslashes(htmlspecialchars($_POST['so_luong'])));
	$khoa = trim(addslashes(htmlspecialchars($_POST['khoa'])));
	$phong_hoc = trim(addslashes(htmlspecialchars($_POST['phong_hoc'])));
	$ca_hoc = trim(addslashes(htmlspecialchars($_POST['ca_hoc'])));
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '3';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Lớp Học';
	// kiểm tra dữ liệu trùng
	$test = "SELECT * FROM `lop_hoc` WHERE id_gv='$gv' AND id_cahoc='$ca_hoc' and id_phonghoc='$phong_hoc'
	or (id_cahoc='$ca_hoc' and id_gv='$gv') or (id_phonghoc='$phong_hoc' and id_cahoc='$ca_hoc')";
	$count = $db->num_rows($test);
	if ($count >= 1) {
		$_SESSION['status'] = "Giảng viên bị trùng lịch hoặc do phòng học đã có lớp học vào ca bạn vừa thêm!";
		new Redirect($_DOMAIN . 'lophoc');
	} else {
		//insert
		$query = "INSERT INTO 
		`lop_hoc`(`MaLop`, `Khoa`, `id_gv`, `trangthailop`, `si_so`, `id_mh`,id_phonghoc,id_cahoc) 
		VALUES	('$ma_lop','$khoa','$gv',1,'$so_luong','$mh','$phong_hoc','$ca_hoc')";
		$query_run = $db->query($query);
		if ($query_run) {
			$_SESSION['status'] = "Thêm Thất Bại";
			new Redirect($_DOMAIN . 'lophoc');
		} else {
			$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  			VALUES('$user','$usertype','$action','$data','$date','$time')";
			$db->query($history);
			$_SESSION['success'] = "Thêm Thành Công ";
			new Redirect($_DOMAIN . 'lophoc');
		}
	}
}
// thêm học viên mới
if (isset($_POST['add_hv'])) {
	$lop = trim(addslashes(htmlspecialchars($_POST['lop'])));
	$ten = trim(addslashes(htmlspecialchars($_POST['ten'])));
	$dc = trim(addslashes(htmlspecialchars($_POST['dc'])));
	$sdt = trim(addslashes(htmlspecialchars($_POST['sdt'])));
	$ns = trim(addslashes(htmlspecialchars($_POST['ns'])));
	$email = trim(addslashes(htmlspecialchars($_POST['email'])));
	$pass = md5(12345);
	$ma = 'HV-' . (mt_rand());
	$sql1 = "SELECT * FROM register WHERE phone='$sdt' or email='$email'";
	$update_sl = "UPDATE `lop_hoc` SET `da_dk`=da_dk+1 WHERE id_lop = '$lop' ";
	$sql = "INSERT INTO `register`
	(`email`, `password`, `username`, `usertype`, `status`, `user_code`, `address`, `phone`,`birth`) 
	VALUES ('$email','$pass','$ten','6','0','$ma','$dc','$sdt','$ns')";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '3';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Thêm Học Viên vào Lớp Học';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

	if ($db->num_rows($sql1) >= 1) {
		$_SESSION['status'] = "Thêm Học Viên $ten Vào Lớp Học Thất Bại. Số Điện Thoại Hoặc Email Đã Tồn Tại Trong Hệ Thống ";
		new Redirect($_DOMAIN . 'lophoc');
	} else {
		if (!$db->query($sql)) {
			$sql2 = "INSERT INTO `chi_tiet_lop_hoc`
			(`id_hs`, `id_lop`, `thanhtoan`) VALUES
			((SELECT id FROM `register` WHERE phone = '$sdt'),'$lop','0')";
			if ($db->query($sql2)) {
				$_SESSION['status'] = "Thêm Thất Bại ";
				new Redirect($_DOMAIN . 'lophoc');
			} else {
				$db->query($update_sl);
				$db->query($history);
				$_SESSION['success'] = "Thêm Học Viên $ten Vào Lớp Học Thành Công";
				new Redirect($_DOMAIN . 'lophoc');
			}
		} else {
			$_SESSION['status'] = "Thêm Thất Bại";
			new Redirect($_DOMAIN . 'lophoc');
		}
	}
}
//xoá học viên ra khỏi lớP học
if (isset($_POST['delete_hv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
	$sql = "DELETE FROM `chi_tiet_lop_hoc` WHERE id_hs = '$id'";
	$lop = trim(addslashes(htmlspecialchars($_POST['lop'])));
	$update_sl = "UPDATE `lop_hoc` SET `da_dk`=da_dk-1 WHERE id_lop = '$lop' ";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '4';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Xoá Học Viên Khỏi Lớp Học';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
	if ($db->query($sql)) {
		$_SESSION['status'] = "Xóa thất bại";
		new Redirect($_DOMAIN . 'lophoc');
	} else {
		$db->query($history);
		$db->query($update_sl);
		$_SESSION['success'] = "Xóa thành công";
		new Redirect($_DOMAIN . 'lophoc');
	}
}
//thông báo
if (isset($_POST['thongbao'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$thongbao = trim(addslashes(htmlspecialchars($_POST['tb'])));
		$sql = "UPDATE `lop_hoc` SET 
		`thongbao`='$thongbao'
		WHERE `id_lop`='$id'";
		//history log
		$user = $data_user['username'];
		$usertype = $data_user['usertype'];
		$action = '3';
		$date = date("d-m-Y");
		$time = date("H:i:s");
		$data = 'Thông Báo Lớp Học';
		$query_run = $db->query($sql);
		if ($query_run) {
			$_SESSION['status'] = "Thông Báo Thất Bại";
			new Redirect($_DOMAIN . 'lophoc');
		} else {
			$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  			VALUES('$user','$usertype','$action','$data','$date','$time')";
			$db->query($history);
			$_SESSION['success'] = "Thông Báo Thành Công ";
			new Redirect($_DOMAIN . 'lophoc');
		}
	
}
//sửa giờ học
if (isset($_POST['update_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$id_gv = trim(addslashes(htmlspecialchars($_POST['id_gv'])));
	$phong_hoc = trim(addslashes(htmlspecialchars($_POST['phong_hoc'])));
	$ca_hoc = trim(addslashes(htmlspecialchars($_POST['ca_hoc'])));
	$test = "SELECT * FROM `lop_hoc` 
	WHERE (trangthailop  IN (4) and id_gv='$id_gv' AND id_cahoc='$ca_hoc' and id_phonghoc='$phong_hoc')
	or (trangthailop  IN (4) and id_cahoc='$ca_hoc' and id_gv='$id_gv') 
	or (trangthailop  IN (4) and id_phonghoc='$phong_hoc' and id_cahoc='$ca_hoc')";
	$count = $db->num_rows($test);
	if ($count >= 1) {
		$_SESSION['status'] = "Giảng viên bị trùng lịch hoặc do phòng học đã có lớp học vào ca bạn vừa sửa! ";
		new Redirect($_DOMAIN . 'lophoc');
	} else {
		$sql = "UPDATE `lop_hoc` SET 
		`id_gv`='$id_gv',
		`id_phonghoc`='$phong_hoc',
		`id_cahoc`='$ca_hoc'
		WHERE `id_lop`='$id'";
		//history log
		$user = $data_user['username'];
		$usertype = $data_user['usertype'];
		$action = '5';
		$date = date("d-m-Y");
		$time = date("H:i:s");
		$data = 'Lịch Học';
		$query_run = $db->query($sql);
		if ($query_run) {
			$_SESSION['status'] = "Sửa Thất Bại";
			new Redirect($_DOMAIN . 'lophoc');
		} else {
			$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  			VALUES('$user','$usertype','$action','$data','$date','$time')";
			$db->query($history);
			$_SESSION['success'] = "Sửa Thành Công ";
			new Redirect($_DOMAIN . 'lophoc');
		}
	}
}
//Cập nhật lịch thi
if (isset($_POST['update_lichthi'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$ngay_thi = trim(addslashes(htmlspecialchars($_POST['ngay_thi'])));
	$gio_thi = trim(addslashes(htmlspecialchars($_POST['gio_thi'])));
	$id_phongthi = trim(addslashes(htmlspecialchars($_POST['id_phongthi'])));
	$id_gv = trim(addslashes(htmlspecialchars($_POST['id_gv'])));
	$test = "SELECT * FROM `lop_hoc` 
	WHERE (trangthailop  IN (4,5) and id_gv_thi='$id_gv' AND id_cathi='$gio_thi' and id_phongthi='$id_phongthi' and ngay_thi='$ngay_thi')
	or (trangthailop  IN (4,5) and id_cathi='$gio_thi' and id_gv_thi='$id_gv' and ngay_thi='$ngay_thi') 
	or (trangthailop  IN (4,5) and id_phongthi='$id_phongthi' and id_cathi='$gio_thi' and ngay_thi='$ngay_thi')";
	$count = $db->num_rows($test);
	if ($count >= 1) {
		$_SESSION['status'] = "Giảng viên bị trùng lịch hoặc do phòng đã có lớp học vào ca bạn vừa cập nhật!";
		new Redirect($_DOMAIN . 'lophoc');
	} else {
		//insert
		$sql = "UPDATE `lop_hoc` SET 
		`id_gv_thi`='$id_gv',
		`id_phongthi`='$id_phongthi',
		`id_cathi`='$gio_thi',
		`ngay_thi`='$ngay_thi'
		WHERE `id_lop`='$id'";
		//history log
		$user = $data_user['username'];
		$usertype = $data_user['usertype'];
		$action = '5';
		$date = date("d-m-Y");
		$time = date("H:i:s");
		$data = 'Lịch Thi';
		$query_run = $db->query($sql);
		if ($query_run) {
			$_SESSION['status'] = "Sửa Thất Bại";
			new Redirect($_DOMAIN . 'lophoc');
		} else {
			$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  			VALUES('$user','$usertype','$action','$data','$date','$time')";
			$db->query($history);
			$_SESSION['success'] = "Sửa Thành Công ";
			new Redirect($_DOMAIN . 'lophoc');
		}
	}
}
//sửa trạng thái Lớp học
if (isset($_POST['update_tt'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$MaLop = trim(addslashes(htmlspecialchars($_POST['MaLop'])));
	$si_so = trim(addslashes(htmlspecialchars($_POST['si_so'])));
	$ten_monhoc = trim(addslashes(htmlspecialchars($_POST['ten_monhoc'])));
	$trangthailop = trim(addslashes(htmlspecialchars($_POST['trangthailop'])));
	$sql = "UPDATE `lop_hoc` SET 
		`MaLop`='$MaLop',
		`si_so`='$si_so',
		`id_mh`='$ten_monhoc',
		`trangthailop`='$trangthailop'
		WHERE `id_lop`='$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '5';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Trạng Thái Lớp Học';
	$query_run = $db->query($sql);
	if ($query_run) {
		$_SESSION['status'] = "Sửa Thất Bại";
		new Redirect($_DOMAIN . 'lophoc');
	} else {
		$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  			VALUES('$user','$usertype','$action','$data','$date','$time')";
		$db->query($history);
		$_SESSION['success'] = "Sửa Thành Công ";
		new Redirect($_DOMAIN . 'lophoc');
	}
}
if (isset($_POST['update_lhc'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$trangthailop = trim(addslashes(htmlspecialchars($_POST['trangthailop'])));
	$sql = "UPDATE `lop_hoc` SET 
		`trangthailop`='$trangthailop'
		WHERE `id_lop`='$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '5';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Trạng Thái Lớp Học';
	$query_run = $db->query($sql);
	if ($query_run) {
		$_SESSION['status'] = "Sửa Thất Bại";
		new Redirect($_DOMAIN . 'lophoc_cu');
	} else {
		$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  			VALUES('$user','$usertype','$action','$data','$date','$time')";
		$db->query($history);
		$_SESSION['success'] = "Sửa Thành Công ";
		new Redirect($_DOMAIN . 'lophoc_cu');
	}
}
//xoá Lớp học
if (isset($_POST['delete_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
	$sql = "DELETE FROM `lop_hoc` WHERE id_lop = '$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '4';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Lớp Học';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
	if ($db->query($sql)) {
		$_SESSION['status'] = "Xóa thất bại";
		new Redirect($_DOMAIN . 'lophoc');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Xóa thành công";
		new Redirect($_DOMAIN . 'lophoc');
	}
}
