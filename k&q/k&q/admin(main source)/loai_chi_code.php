<?php
require_once 'core/init.php';
if (isset($_POST['add'])) {
	$loai = trim(addslashes(htmlspecialchars($_POST['loai'])));
	$loai = trim(addslashes(htmlspecialchars($_POST['loai'])));
	$ten_loai = trim(addslashes(htmlspecialchars($_POST['ten_loai'])));
	$sql = "INSERT INTO loai_thu_chi(Loai,TenLoai) VALUES('$loai','$ten_loai')";
	if ($db->query($sql)) {
		//history log
		$user = $data_user['username'];
		$usertype = $data_user['usertype'];
		$action = '3';
		$date = date("d-m-Y");
		$time = date("H:i:s");
		$data = 'Loại Thu Chi';
		$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
		$db->query($history);
		$_SESSION['status'] = "Thêm Thất Bại";
		new Redirect($_DOMAIN . 'loaithuchi');
	} else {
		$_SESSION['success'] = "Thêm Thành Công";
		new Redirect($_DOMAIN . 'loaithuchi');
	}
}
if (isset($_POST['update'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$ten_loai = trim(addslashes(htmlspecialchars($_POST['ten_loai'])));
	$sql = "UPDATE loai_thu_chi SET TenLoai ='$ten_loai' WHERE id_loaithuchi ='$id'";
	if ($db->query($sql)) {
		$_SESSION['status'] = "Sửa Thất Bại";
		new Redirect($_DOMAIN . 'loaithuchi');
	} else {
		//history log
		$user = $data_user['username'];
		$usertype = $data_user['usertype'];
		$action = '4';
		$date = date("d-m-Y");
		$time = date("H:i:s");
		$data = 'Loại Thu Chi';
		$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
		$db->query($history);
		$_SESSION['success'] = "Sửa thành công";
		new Redirect($_DOMAIN . 'loaithuchi');
	}
}
if (isset($_POST['delete_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
	$sql = "DELETE FROM loai_thu_chi WHERE  id_loaithuchi ='$id'";
	if ($db->query($sql)) {
		$_SESSION['status'] = "Xóa thất bại";
		new Redirect($_DOMAIN . 'loaithuchi');
	} else {
		//history log
		$user = $data_user['username'];
		$usertype = $data_user['usertype'];
		$action = '4';
		$date = date("d-m-Y");
		$time = date("H:i:s");
		$data = 'Loại Thu Chi';
		$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
		$db->query($history);
		$_SESSION['success'] = "Xóa thành công";
		new Redirect($_DOMAIN . 'loaithuchi');
	}
}
