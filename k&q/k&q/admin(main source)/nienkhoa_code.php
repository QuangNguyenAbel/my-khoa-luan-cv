<?php
require_once 'core/init.php';
if (isset($_POST['add_cv'])) {
	$ten_nk = trim(addslashes(htmlspecialchars($_POST['ten_nk'])));
	$nam = trim(addslashes(htmlspecialchars($_POST['nam'])));
	$NgayKhaiGiang = trim(addslashes(htmlspecialchars($_POST['NgayKhaiGiang'])));
	$NgayKetThuc = trim(addslashes(htmlspecialchars($_POST['NgayKetThuc'])));
	$HanDangKy = trim(addslashes(htmlspecialchars($_POST['HanDangKy'])));
	$NgayChoDangKy = trim(addslashes(htmlspecialchars($_POST['NgayChoDangKy'])));
	$sql = "INSERT INTO `nien_khoa`(`ten_nk`, `nam_nk`, `trangthai_nk`, `NgayKhaiGiang`, `NgayKetThuc`, `HanDangKy`, `NgayChoDangKy`)  
	VALUES('$ten_nk','$nam','1','$NgayKhaiGiang','$NgayKetThuc','$HanDangKy','$NgayChoDangKy')";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '3';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Niên Khoá';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

	if ($db->query($sql)) {
		$_SESSION['status'] = "Thêm Thất Bại";
		new Redirect($_DOMAIN . 'nienkhoa');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Thêm Thành Công $sql";
		new Redirect($_DOMAIN . 'nienkhoa');
	}
}
if (isset($_POST['update_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$ten_nk = trim(addslashes(htmlspecialchars($_POST['ten_nk'])));
	$nam_nk = trim(addslashes(htmlspecialchars($_POST['nam_nk'])));
	$tt_nk = trim(addslashes(htmlspecialchars($_POST['tt_nk'])));
	$NgayChoDangKy = trim(addslashes(htmlspecialchars($_POST['NgayChoDangKy'])));
	$HanDangKy = trim(addslashes(htmlspecialchars($_POST['HanDangKy'])));
	$NgayKhaiGiang = trim(addslashes(htmlspecialchars($_POST['NgayKhaiGiang'])));
	$NgayKetThuc = trim(addslashes(htmlspecialchars($_POST['NgayKetThuc'])));
	$sql = "UPDATE `nien_khoa` 
	SET 
	`ten_nk`='$ten_nk',
	`nam_nk`='$nam_nk',
	`trangthai_nk`='$tt_nk', 
	`NgayChoDangKy`='$NgayChoDangKy', 
	`HanDangKy`='$HanDangKy', 
	`NgayKhaiGiang`='$NgayKhaiGiang', 
	`NgayKetThuc`='$NgayKetThuc'
	WHERE `id_nk`='$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '5';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Niên Khoá';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

	if ($db->query($sql)) {
		$_SESSION['status'] = "Sửa Thất Bại";
		new Redirect($_DOMAIN . 'nienkhoa');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Sửa thành công ";
		new Redirect($_DOMAIN . 'nienkhoa');
	}
}
if (isset($_POST['delete_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
	$sql = "DELETE FROM `nien_khoa` WHERE id_nk = '$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '4';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Niên Khoá';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
	if ($db->query($sql)) {
		$_SESSION['status'] = "Xóa thất bại";
		new Redirect($_DOMAIN . 'nienkhoa');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Xóa thành công";
		new Redirect($_DOMAIN . 'nienkhoa');
	}
}
