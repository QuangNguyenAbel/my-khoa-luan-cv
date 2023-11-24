<?php
require_once 'core/init.php';
if (isset($_POST['add_cv'])) {
	$ten_ca = trim(addslashes(htmlspecialchars($_POST['ten_ca'])));
	$ct_ca = trim(addslashes(htmlspecialchars($_POST['ct_ca'])));
	$sql = "INSERT INTO `ca_hoc`(`ten_ca`, `chitiet_ca`) 
	VALUES('$ten_ca','$ct_ca')";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '3';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Ca Học';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

	if ($db->query($sql)) {
		$_SESSION['status'] = "Thêm Thất Bại";
		new Redirect($_DOMAIN . 'ca_hoc');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Thêm Thành Công";
		new Redirect($_DOMAIN . 'ca_hoc');
	}
}
if (isset($_POST['update_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$edit_ca = trim(addslashes(htmlspecialchars($_POST['edit_ca'])));
	$edit_ct_ca = trim(addslashes(htmlspecialchars($_POST['edit_ct_ca'])));
	$sql = "UPDATE `ca_hoc` SET `ten_ca`='$edit_ca',`chitiet_ca`='$edit_ct_ca' WHERE `id_ca`='$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '5';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Ca Học';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

	if ($db->query($sql)) {
		$_SESSION['status'] = "Sửa Thất Bại";
		new Redirect($_DOMAIN . 'ca_hoc');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Sửa thành công";
		new Redirect($_DOMAIN . 'ca_hoc');
	}
}
if (isset($_POST['delete_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
	$sql = "DELETE FROM `ca_hoc` WHERE id_ca = '$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '4';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Ca Học';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
	if ($db->query($sql)) {
		$_SESSION['status'] = "Xóa thất bại";
		new Redirect($_DOMAIN . 'ca_hoc');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Xóa thành công";
		new Redirect($_DOMAIN . 'ca_hoc');
	}
}
