<?php
require_once 'core/init.php';
//thêm Khoá Học
if (isset($_POST['add_lhdk'])) {
	$mh = trim(addslashes(htmlspecialchars($_POST['mh'])));
	$ma_lop = trim(addslashes(htmlspecialchars($_POST['ma_lop'])));
	$gv = trim(addslashes(htmlspecialchars($_POST['gv'])));
	$so_luong = trim(addslashes(htmlspecialchars($_POST['so_luong'])));
	$khoa = trim(addslashes(htmlspecialchars($_POST['khoa'])));
	$phong_hoc = trim(addslashes(htmlspecialchars($_POST['phong_hoc'])));
	$ca_hoc = trim(addslashes(htmlspecialchars($_POST['ca_hoc'])));
	$so_bh = trim(addslashes(htmlspecialchars($_POST['so_bh'])));

	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '3';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Khoá Học';
	// kiểm tra dữ liệu trùng
	$test = "SELECT * FROM `lop_hoc` 
	WHERE (trangthailop  IN (1,2,3) and id_gv='$id_gv' AND id_cahoc='$ca_hoc' and id_phonghoc='$phong_hoc')
	or (trangthailop  IN (1,2,3) and id_cahoc='$ca_hoc' and id_gv='$id_gv') 
	or (trangthailop  IN (1,2,3) and id_phonghoc='$phong_hoc' and id_cahoc='$ca_hoc')";
	$count = $db->num_rows($test);
	if ($count >= 1) {
		$_SESSION['status'] = "Giảng viên bị trùng lịch hoặc do phòng học đã có Khoá Học vào ca bạn vừa thêm!";
		new Redirect($_DOMAIN . 'khoahoc');
	} else {
		//insert
		$query = "INSERT INTO 
		`lop_hoc`(`MaLop`, `Khoa`, `id_gv`, `trangthailop`, `si_so`, `id_mh`,id_phonghoc,id_cahoc,so_bh) 
		VALUES	('$ma_lop','$khoa','$gv',1,'$so_luong','$mh','$phong_hoc','$ca_hoc','$so_bh')";
		$query_run = $db->query($query);
		if ($query_run) {
			$_SESSION['status'] = "Thêm Thất Bại";
			new Redirect($_DOMAIN . 'khoahoc');
		} else {
			$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  			VALUES('$user','$usertype','$action','$data','$date','$time')";
			$db->query($history);
			$_SESSION['success'] = "Thêm Thành Công ";
			new Redirect($_DOMAIN . 'khoahoc');
		}
	}
}
// thêm học viên mới
if (isset($_POST['add_hv'])) {
	$lop = trim(addslashes(htmlspecialchars($_POST['lop'])));
	$ma_hv = trim(addslashes(htmlspecialchars($_POST['ma_hv'])));
	$sql1 = "SELECT * FROM register WHERE user_code = '$ma_hv'";
	$update_sl = "UPDATE `lop_hoc` SET `da_dk`=da_dk+1 WHERE id_lop = '$lop' ";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '3';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Thêm Học Viên vào Khoá Học';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
	$sql2 = "SELECT * FROM chi_tiet_lop_hoc WHERE id_hs=(SELECT id FROM `register` WHERE user_code = '$ma_hv') and id_lop=$lop";
	if ($db->num_rows($sql1) < 1) {
		$_SESSION['status'] = "Thêm Học Viên Vào Khoá Học Thất Bại. Không tồn tại mã học viên $ma_hv ";
		new Redirect($_DOMAIN . 'khoahoc');
	} else {
		if ($db->num_rows($sql2) < 1) {
			if (!$db->query($sql)) {
				$sql2 = "INSERT INTO `chi_tiet_lop_hoc`
				(`id_hs`, `id_lop`, `thanhtoan`) VALUES
				((SELECT id FROM `register` WHERE user_code = '$ma_hv'),'$lop','0')";
				if ($db->query($sql2)) {
					$_SESSION['status'] = "Thêm Thất Bại ";
					new Redirect($_DOMAIN . 'khoahoc');
				} else {
					$db->query($update_sl);
					$db->query($history);
					$_SESSION['success'] = "Thêm Học Viên Vào Khoá Học Thành Công";
					new Redirect($_DOMAIN . 'khoahoc');
				}
			} else {
				$_SESSION['status'] = "Thêm Thất Bại";
				new Redirect($_DOMAIN . 'khoahoc');
			}
		} else {
			$_SESSION['status'] = "Thêm Học Viên Vào Khoá Học Thất Bại. Học viên $ma_hv đã tồn tại trong lớp học! ";
			new Redirect($_DOMAIN . 'khoahoc');
		}
	}
}
// học viên đăng ký
if (isset($_POST['dangky'])) {
	$MaLop = trim(addslashes(htmlspecialchars($_POST['MaLop'])));
	$id_hv = trim(addslashes(htmlspecialchars($_POST['id_hv'])));
	$id_lop = trim(addslashes(htmlspecialchars($_POST['id_lop'])));
	$update_sl = "UPDATE `lop_hoc` SET `da_dk`=da_dk+1 WHERE id_lop = '$id_lop' ";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '3';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Học Viên Đăng Ký Khoá Học';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

	$sql2 = "INSERT INTO `chi_tiet_lop_hoc`
				(`id_hs`, `id_lop`, `thanhtoan`) VALUES
				((SELECT id FROM `register` WHERE id = '$id_hv'),'$id_lop','0')";
	if ($db->query($sql2)) {
		$_SESSION['status'] = "Đăng Ký Thất Bại ";
		new Redirect($_DOMAIN . 'dangkykhoahoc');
	} else {
		$db->query($update_sl);
		$db->query($history);
		$_SESSION['success'] = "Đăng Ký Khoá Học $MaLop Thành Công";
		new Redirect($_DOMAIN . 'dangkykhoahoc');
	}
}
//xoá học viên ra khỏi Khoá Học
if (isset($_POST['delete_hv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
	$lop = trim(addslashes(htmlspecialchars($_POST['lop'])));
	$sql = "DELETE FROM `chi_tiet_lop_hoc` WHERE id_hs = '$id' and id_lop='$lop'";
	$update_sl = "UPDATE `lop_hoc` SET `da_dk`=da_dk-1 WHERE id_lop = '$lop' ";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '4';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Xoá Học Viên Khỏi Khoá Học';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
	if ($db->query($sql)) {
		$_SESSION['status'] = "Xóa thất bại";
		new Redirect($_DOMAIN . 'khoahoc');
	} else {
		$db->query($history);
		$db->query($update_sl);
		$_SESSION['success'] = "Xóa thành công";
		new Redirect($_DOMAIN . 'khoahoc');
	}
}
//chuyển khoá học của học viên
if (isset($_POST['chuyen_lop'])) {
	$id_lop_old = trim(addslashes(htmlspecialchars($_POST['id_lop_old'])));
	$id_ct_lop = trim(addslashes(htmlspecialchars($_POST['id_ct_lop'])));
	$id_lop_new = trim(addslashes(htmlspecialchars($_POST['id_lop_new'])));
	$sql = "UPDATE `chi_tiet_lop_hoc` 
	SET `id_lop`='$id_lop_new'
	where `id_ct_lop`='$id_ct_lop' 
	";
	$update_sl_tru = "UPDATE `lop_hoc` SET `da_dk`=da_dk-1 WHERE id_lop = '$id_lop_old' ";
	$update_sl_cong = "UPDATE `lop_hoc` SET `da_dk`=da_dk+1 WHERE id_lop = '$id_lop_new' ";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '5';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Chuyển Khoá Học Cho Học Viên ';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
	if ($db->query($sql)) {
		$_SESSION['status'] = "Chuyển Lớp thất bại ";
		new Redirect($_DOMAIN . 'hocvien');
	} else {
		$db->query($history);
		$db->query($update_sl_cong);
		$db->query($update_sl_tru);
		$_SESSION['success'] = "Chuyển Lớp thành công ";
		new Redirect($_DOMAIN . 'hocvien');
	}
}
//xoá khoá học của học viên
if (isset($_POST['delete_lh'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
	$lop = trim(addslashes(htmlspecialchars($_POST['lop'])));
	$sql = "DELETE FROM `chi_tiet_lop_hoc` WHERE id_hs = '$id' and id_lop='$lop'";
	$update_sl = "UPDATE `lop_hoc` SET `da_dk`=da_dk-1 WHERE id_lop = '$lop' ";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '4';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Xoá Học Viên Khỏi Khoá Học';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
	if ($db->query($sql)) {
		$_SESSION['status'] = "Xóa thất bại ";
		new Redirect($_DOMAIN . 'hocvien');
	} else {
		$db->query($history);
		$db->query($update_sl);
		$_SESSION['success'] = "Xóa thành công";
		new Redirect($_DOMAIN . 'hocvien');
	}
}
//sửa Khoá Học
if (isset($_POST['update_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$id_gv = trim(addslashes(htmlspecialchars($_POST['id_gv'])));
	$phong_hoc = trim(addslashes(htmlspecialchars($_POST['phong_hoc'])));
	$ca_hoc = trim(addslashes(htmlspecialchars($_POST['ca_hoc'])));
	$test = "SELECT * FROM `lop_hoc` 
	WHERE (trangthailop  IN (1,2,3) and id_gv='$id_gv' AND id_cahoc='$ca_hoc' and id_phonghoc='$phong_hoc')
	or (trangthailop  IN (1,2,3) and id_cahoc='$ca_hoc' and id_gv='$id_gv') 
	or (trangthailop  IN (1,2,3) and id_phonghoc='$phong_hoc' and id_cahoc='$ca_hoc')";
	$count = $db->num_rows($test);
	if ($count >= 1) {
		$_SESSION['status'] = "Giảng viên bị trùng lịch hoặc do phòng học đã có Khoá Học vào ca bạn vừa sửa! ";
		new Redirect($_DOMAIN . 'khoahoc');
	} else {
		//insert
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
		$data = 'Khoá Học';
		$query_run = $db->query($sql);
		if ($query_run) {
			$_SESSION['status'] = "Sửa Thất Bại";
			new Redirect($_DOMAIN . 'khoahoc');
		} else {
			$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  			VALUES('$user','$usertype','$action','$data','$date','$time')";
			$db->query($history);
			$_SESSION['success'] = "Sửa Thành Công ";
			new Redirect($_DOMAIN . 'khoahoc');
		}
	}
}
//sửa trạng thái Khoá Học
if (isset($_POST['update_tt'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$MaLop = trim(addslashes(htmlspecialchars($_POST['MaLop'])));
	$si_so = trim(addslashes(htmlspecialchars($_POST['si_so'])));
	$ten_monhoc = trim(addslashes(htmlspecialchars($_POST['ten_monhoc'])));
	$so_bh = trim(addslashes(htmlspecialchars($_POST['so_bh'])));
	$trangthailop = trim(addslashes(htmlspecialchars($_POST['trangthailop'])));
	$sql = "UPDATE `lop_hoc` SET 
		`MaLop`='$MaLop',
		`si_so`='$si_so',
		`so_bh`='$so_bh',
		`id_mh`='$ten_monhoc',
		`trangthailop`='$trangthailop'
		WHERE `id_lop`='$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '5';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Trạng Thái Khoá Học';
	$query_run = $db->query($sql);
	if ($query_run) {
		$_SESSION['status'] = "Sửa Thất Bại";
		new Redirect($_DOMAIN . 'khoahoc');
	} else {
		$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  			VALUES('$user','$usertype','$action','$data','$date','$time')";
		$db->query($history);
		$_SESSION['success'] = "Sửa Thành Công ";
		new Redirect($_DOMAIN . 'khoahoc');
	}
}
//xoá Khoá Học
if (isset($_POST['delete_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
	$sql = "DELETE FROM `lop_hoc` WHERE id_lop = '$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '4';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Khoá Học';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
	if ($db->query($sql)) {
		$_SESSION['status'] = "Xóa thất bại";
		new Redirect($_DOMAIN . 'khoahoc');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Xóa thành công";
		new Redirect($_DOMAIN . 'khoahoc');
	}
}
