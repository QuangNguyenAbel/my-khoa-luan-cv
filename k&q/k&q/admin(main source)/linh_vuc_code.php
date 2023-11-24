<?php
require_once 'core/init.php';
if (isset($_POST['add_cv'])) {
	$ten_lv = trim(addslashes(htmlspecialchars($_POST['ten_lv'])));
	$gt_lv = ($_POST['gt_lv']);
	$sql = "INSERT INTO `linh_vuc`(`ten_lv`, `gioithieu_lv`) 
    VALUES ('$ten_lv','$gt_lv')";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '3';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Lĩnh Vực';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

	if ($db->query($sql)) {
		$_SESSION['status'] = "Thêm Thất Bại";
		new Redirect($_DOMAIN . 'linhvuc');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Thêm Thành Công ";
		new Redirect($_DOMAIN . 'linhvuc');
	}
}

if (isset($_POST['update_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$ten_lv = trim(addslashes(htmlspecialchars($_POST['ten_lv'])));
	$gioithieu_lv = ($_POST['gioithieu_lv']);
	$sql = "UPDATE `linh_vuc` SET `ten_lv`='$ten_lv',`gioithieu_lv`='$gioithieu_lv' WHERE `id_lv`='$id' ";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '5';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Lĩnh Vực';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

	if ($db->query($sql)) {
		$_SESSION['status'] = "Sửa Thất Bại";
		new Redirect($_DOMAIN . 'linhvuc');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Sửa thành công";
		new Redirect($_DOMAIN . 'linhvuc');
	}
}
if (isset($_POST['delete_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
	$sql = "DELETE FROM `linh_vuc` WHERE id_lv = '$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '4';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Lĩnh Vực';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
	if ($db->query($sql)) {
		$_SESSION['status'] = "Xóa thất bại";
		new Redirect($_DOMAIN . 'linhvuc');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Xóa thành công";
		new Redirect($_DOMAIN . 'linhvuc');
	}
}
