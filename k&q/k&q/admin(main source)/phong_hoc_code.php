<?php
require_once 'core/init.php';
if (isset($_POST['add_phong'])) {
	$ma_phong = trim(addslashes(htmlspecialchars($_POST['ma_phong'])));
	$ttp = trim(addslashes(htmlspecialchars($_POST['ttp'])));
	$suc_chua=trim(addslashes(htmlspecialchars($_POST['suc_chua'])));
	$sql = "INSERT INTO `phong_hoc`(`Phong`, `id_ttp`,suc_chua) VALUES ('$ma_phong','$ttp','$suc_chua')";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '3';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Phòng Học';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

	if ($db->query($sql)) {
		$_SESSION['status'] = "Thêm Thất Bại";
		new Redirect($_DOMAIN . 'phonghoc');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Thêm Thành Công ";
		new Redirect($_DOMAIN . 'phonghoc');
	}
}
if (isset($_POST['update_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$edit_ma_phong = trim(addslashes(htmlspecialchars($_POST['edit_ma_phong'])));
	$suc_chua=trim(addslashes(htmlspecialchars($_POST['suc_chua'])));
	$ttp = trim(addslashes(htmlspecialchars($_POST['ttp'])));
	$sql = "UPDATE `phong_hoc` SET `Phong`='$edit_ma_phong',`suc_chua`='$suc_chua',`id_ttp`='$ttp' WHERE id_phong='$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '5';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Phòng Học';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

	if ($db->query($sql)) {
		$_SESSION['status'] = "Sửa Thất Bại";
		new Redirect($_DOMAIN . 'phonghoc');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Sửa thành công ";
		new Redirect($_DOMAIN . 'phonghoc');
	}
}
if (isset($_POST['delete_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
	$sql = "DELETE FROM `phong_hoc` WHERE id_phong = '$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '4';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Phòng Học';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
	if ($db->query($sql)) {
		$_SESSION['status'] = "Xóa thất bại";
		new Redirect($_DOMAIN . 'phonghoc');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Xóa thành công";
		new Redirect($_DOMAIN . 'phonghoc');
	}
}
