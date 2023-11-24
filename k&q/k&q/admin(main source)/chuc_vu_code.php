<?php
require_once 'core/init.php';
if (isset($_POST['add_cv'])) {
	$ten_chuc_vu = trim(addslashes(htmlspecialchars($_POST['ten_chuc_vu'])));
	$sql = "INSERT INTO chuc_vu(TenChucVu) VALUES('$ten_chuc_vu')";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '3';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Chức vụ';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

	if ($db->query($sql)) {
		$_SESSION['status'] = "Thêm Thất Bại";
		new Redirect($_DOMAIN . 'chucvu');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Thêm Thành Công";
		new Redirect($_DOMAIN . 'chucvu');
	}
}
if (isset($_POST['update_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$ten_chuc_vu = trim(addslashes(htmlspecialchars($_POST['edit_chuc_vu'])));
	$sql = "UPDATE chuc_vu SET TenChucVu ='$ten_chuc_vu' WHERE id_cv ='$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '5';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Chức vụ:' . $ten_chuc_vu;
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

	if ($db->query($sql)) {
		$_SESSION['status'] = "Sửa Thất Bại";
		new Redirect($_DOMAIN . 'chucvu');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Sửa thành công";
		new Redirect($_DOMAIN . 'chucvu');
	}
}
if (isset($_POST['delete_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
	$sql = "DELETE FROM chuc_vu WHERE  id_cv ='$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '4';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Chức vụ:' . $ten_chuc_vu;
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
	if ($db->query($sql)) {
		$_SESSION['status'] = "Xóa thất bại";
		new Redirect($_DOMAIN . 'chucvu');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Xóa thành công";
		new Redirect($_DOMAIN . 'chucvu');
	}
}
