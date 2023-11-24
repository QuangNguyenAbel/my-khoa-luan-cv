<?php
require_once 'core/init.php';
if (isset($_POST['dk_thi_lai'])) {
	$id_ct_lop = trim(addslashes(htmlspecialchars($_POST['id_ct_lop'])));
	$sql = "UPDATE `chi_tiet_lop_hoc` 
    SET `thi_lai`='1' WHERE `id_ct_lop`='$id_ct_lop'";
	//history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '5';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Đăng Ký Thi Lại';
	$query_run = $db->query($sql);
	if ($query_run) {
		$_SESSION['status'] = "Đăng Ký Thi Lại Thất bại ";
		new Redirect($_DOMAIN . 'dangky_thilai');
	} else {
		$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  			VALUES('$user','$usertype','$action','$data','$date','$time')";
		$db->query($history);
		$_SESSION['success'] = "Đăng Ký Thi Lại Thành Công $sql";
		new Redirect($_DOMAIN . 'dangky_thilai');
	}
}
