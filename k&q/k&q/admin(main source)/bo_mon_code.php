<?php
require_once 'core/init.php';
if (isset($_POST['add_cv'])) {
	$ten_bo_mon = trim(addslashes(htmlspecialchars($_POST['ten_bo_mon'])));
	$id_lv = trim(addslashes(htmlspecialchars($_POST['id_lv'])));
	$gt_bm = ($_POST['gt_bm']);
	$sql = "INSERT INTO `bo_mon`(`ten_bomon`, `gioithieu_bm`, `type_lv`) 
    VALUES ('$ten_bo_mon','$gt_bm','$id_lv')";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '3';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Bộ Môn';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
	 
	if ($db->query($sql)) {
		$_SESSION['status'] = "Thêm Thất Bại";
		new Redirect($_DOMAIN . 'bo_mon');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Thêm Thành Công ";
		new Redirect($_DOMAIN . 'bo_mon');
	}
}
if (isset($_POST['add_gv'])) {
	$gv = trim(addslashes(htmlspecialchars($_POST['gv'])));
	$edit_id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$sql = "INSERT INTO `ct_gv`(`id_gv`, `id_bo_mon`) 
    VALUES ('$gv','$edit_id')";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '3';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Thêm Giảng Viên Dạy Bộ Môn';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

	if ($db->query($sql)) {
		$_SESSION['status'] = "Thêm Giảng Viên Dạy Thất Bại";
		new Redirect($_DOMAIN . 'bo_mon');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Thêm Giảng Viên Dạy Thành Công ";
		new Redirect($_DOMAIN . 'bo_mon');
	}
}
if (isset($_POST['update_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$edit_bm = trim(addslashes(htmlspecialchars($_POST['edit_bm'])));
	$type_lv = trim(addslashes(htmlspecialchars($_POST['type_lv'])));
	$gt_bm = ($_POST['gt_bm']);
	$sql = "UPDATE `bo_mon` SET `ten_bomon`='$edit_bm',`gioithieu_bm`='$gt_bm',`type_lv`='$type_lv' WHERE `id_bo_mon`='$id' ";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '5';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Bộ Môn';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

	if ($db->query($sql)) {
		$_SESSION['status'] = "Sửa Thất Bại";
		new Redirect($_DOMAIN . 'bo_mon');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Sửa thành công ";
		new Redirect($_DOMAIN . 'bo_mon');
	}
}
if (isset($_POST['delete_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
	$sql = "DELETE FROM `bo_mon` WHERE id_bo_mon = '$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '4';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Bộ Môn';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
	if ($db->query($sql)) {
		$_SESSION['status'] = "Xóa thất bại";
		new Redirect($_DOMAIN . 'bo_mon');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Xóa thành công";
		new Redirect($_DOMAIN . 'bo_mon');
	}
}
if (isset($_POST['delete_gv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
	$sql = "DELETE FROM `ct_gv` WHERE id_ctgv = '$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '4';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Môn Giảng Viên Dạy';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
	if ($db->query($sql)) {
		$_SESSION['status'] = "Xóa thất bại";
		new Redirect($_DOMAIN . 'bo_mon');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Xóa thành công";
		new Redirect($_DOMAIN . 'bo_mon');
	}
}