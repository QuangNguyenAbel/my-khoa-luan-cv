<?php
require_once 'core/init.php';
if (isset($_POST['add_cv'])) {
	$ten_mon = trim(addslashes(htmlspecialchars($_POST['ten_mon'])));
    $id_bm = trim(addslashes(htmlspecialchars($_POST['id_bm'])));
	$hoc_phi = trim(addslashes(htmlspecialchars($_POST['hoc_phi'])));
	$so_buoi = trim(addslashes(htmlspecialchars($_POST['so_buoi'])));
	$gt_mh = ($_POST['gt_mh']);
	$sql = "INSERT INTO `mon_hoc`(`type`, `hocphi`, `ten_monhoc`, `gt_mh`, `so_buoi`) 
    VALUES ('$id_bm','$hoc_phi','$ten_mon','$gt_mh','$so_buoi')";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '3';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Môn Học';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

	if ($db->query($sql)) {
		$_SESSION['status'] = "Thêm Thất Bại";
		new Redirect($_DOMAIN . 'monhoc');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Thêm Thành Công ";
		new Redirect($_DOMAIN . 'monhoc');
	}
}
if (isset($_POST['update_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$edit_mh = trim(addslashes(htmlspecialchars($_POST['edit_mh'])));
	$hocphi = trim(addslashes(htmlspecialchars($_POST['hocphi'])));
	$bo_mon = trim(addslashes(htmlspecialchars($_POST['bo_mon'])));
	$so_buoi = trim(addslashes(htmlspecialchars($_POST['so_buoi'])));
	$gt_mh = ($_POST['gt_mh']);
	$sql = "UPDATE `mon_hoc` SET 
			`type`='$bo_mon',
			`hocphi`='$hocphi',
			`ten_monhoc`='$edit_mh',
			`so_buoi`='$so_buoi',
			`gt_mh`='$gt_mh' WHERE `id_mon`='$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '5';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Môn Học';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

	if ($db->query($sql)) {
		$_SESSION['status'] = "Sửa Thất Bại";
		new Redirect($_DOMAIN . 'monhoc');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Sửa thành công ";
		new Redirect($_DOMAIN . 'monhoc');
	}
}
if (isset($_POST['delete_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
	$sql = "DELETE FROM `mon_hoc` WHERE id_mon = '$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '4';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Môn Học';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
	if ($db->query($sql)) {
		$_SESSION['status'] = "Xóa thất bại";
		new Redirect($_DOMAIN . 'monhoc');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Xóa thành công";
		new Redirect($_DOMAIN . 'monhoc');
	}
}
