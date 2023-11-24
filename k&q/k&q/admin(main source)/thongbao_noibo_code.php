<?php
require_once 'core/init.php';
if (isset($_POST['add_tb'])) {
	$tua_de = trim(addslashes(htmlspecialchars($_POST['tua_de'])));
    $nd = $_POST['nd'];
    $id_nv_nhan = trim(addslashes(htmlspecialchars($_POST['id_nv_nhan'])));
    $ma_nhan_vien = trim(addslashes(htmlspecialchars($_POST['ma_nhan_vien'])));
    $ten_nv_nhan = trim(addslashes(htmlspecialchars($_POST['ten_nv_nhan'])));
	$loai = trim(addslashes(htmlspecialchars($_POST['loai'])));
	$sql = "INSERT INTO 
    `thong_bao_nb`(`tua_de`,`noi_dung`,`id_nv_tb`,`id_nv_nhan`,`ten_nv_nhan`,`loai_tbnb`) 
    VALUES ('$tua_de','$nd','$ma_nhan_vien','$id_nv_nhan','$ten_nv_nhan','$loai')";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '3';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Thông Báo Nội Bộ';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
	if ($db->query($sql)) {
		$_SESSION['status'] = "Thêm Thất Bại";
		new Redirect($_DOMAIN . 'thongbao_noibo');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Thêm Thành Công ";
		new Redirect($_DOMAIN . 'thongbao_noibo');
	}
}
if (isset($_POST['update_cv'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$tua_de = trim(addslashes(htmlspecialchars($_POST['tua_de'])));
    $nd = trim(addslashes(htmlspecialchars($_POST['nd'])));
	$sql = "UPDATE `thong_bao_nb` SET `tua_de`='$tua_de',`noi_dung`='$nd' WHERE `id_tbnb`='$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '5';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Thông Báo Nội Bộ';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

	if ($db->query($sql)) {
		$_SESSION['status'] = "Sửa Thất Bại";
		new Redirect($_DOMAIN . 'thongbao_noibo');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Sửa thành công";
		new Redirect($_DOMAIN . 'thongbao_noibo');
	}
}
if (isset($_POST['delete_btn'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
	$sql = "DELETE FROM `thong_bao_nb` WHERE id_tbnb = '$id'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '4';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Thông Báo Nội Bộ';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
	if ($db->query($sql)) {
		$_SESSION['status'] = "Xóa thất bại";
		new Redirect($_DOMAIN . 'thongbao_noibo');
	} else {
		$db->query($history);
		$_SESSION['success'] = "Xóa thành công";
		new Redirect($_DOMAIN . 'thongbao_noibo');
	}
}
