<?php
require_once 'core/init.php';
if (isset($_POST['add_cv'])) {
	$ten_ttl = trim(addslashes(htmlspecialchars($_POST['ten_ttl'])));
	$sql = "INSERT INTO `trang_thai_lop`(`ten_ttl`) 
	VALUES('$ten_ttl')";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '3';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Trạng Thái Lớp';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

	if ($db->query($sql)) {
		$_SESSION['status'] = "Thêm Thất Bại";
		new Redirect($_DOMAIN . 'trangthailop');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Thêm Thành Công $sql";
		new Redirect($_DOMAIN . 'trangthailop');
	}
}
if (isset($_POST['update_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$edit_ttl = trim(addslashes(htmlspecialchars($_POST['edit_ttl'])));
	$sql = "UPDATE `trang_thai_lop` SET `ten_ttl`='$edit_ttl' WHERE `id_ttl`='$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '5';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Trạng Thái Lớp';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

	if ($db->query($sql)) {
		$_SESSION['status'] = "Sửa Thất Bại";
		new Redirect($_DOMAIN . 'trangthailop');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Sửa thành công";
		new Redirect($_DOMAIN . 'trangthailop');
	}
}
if (isset($_POST['delete_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
	$sql = "DELETE FROM `trang_thai_lop` WHERE id_ttl = '$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '4';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Trạng Thái Lớp';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
	if ($db->query($sql)) {
		$_SESSION['status'] = "Xóa thất bại";
		new Redirect($_DOMAIN . 'trangthailop');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Xóa thành công";
		new Redirect($_DOMAIN . 'trangthailop');
	}
}
