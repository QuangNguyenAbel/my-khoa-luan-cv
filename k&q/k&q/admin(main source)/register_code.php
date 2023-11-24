<?php
require_once 'core/init.php';
if (isset($_POST['add_ns'])) {
	$hoten = trim(addslashes(htmlspecialchars($_POST['hoten'])));
	$email = trim(addslashes(htmlspecialchars($_POST['email'])));
	$password = trim(addslashes(htmlspecialchars(md5($_POST['password']))));
	$ngay_sinh = trim(addslashes(htmlspecialchars($_POST['ngay_sinh'])));
	$sdt = trim(addslashes(htmlspecialchars($_POST['sdt'])));
	$dia_chi = trim(addslashes(htmlspecialchars($_POST['dia_chi'])));
	$trinh_do = trim(addslashes(htmlspecialchars($_POST['trinh_do'])));
	$chuc_vu = trim(addslashes(htmlspecialchars($_POST['chuc_vu'])));
	$image = $_FILES['image']['name'];
	mt_srand(mktime(1));
	$ma = 'NS-' . (mt_rand());
	$sql1 = "SELECT * FROM register WHERE phone='$sdt' or email='$email'";
	$sql = "INSERT INTO `register`
	(`email`, `password`, `username`, `usertype`, `status`, `user_code`, `address`, `phone`, `granduate`, `birth`, `img`) 
	VALUES ('$email','$password','$hoten','$chuc_vu','0','$ma','$dia_chi','$sdt','$trinh_do','$ngay_sinh','$image')";
	if ($db->num_rows($sql1) >= 1) {
		$_SESSION['success'] = "Thêm Thất Bại, Email Hoặc Số Điện Thoại Đã Tồn Tại!";
		new Redirect($_DOMAIN . 'taikhoan');
	} else {
		if (!$db->query($sql)) {
			//history log
			$user = $data_user['username'];
			$usertype = $data_user['usertype'];
			$action = '3';
			$date = date("d-m-Y");
			$time = date("H:i:s");
			$data = 'Thêm tài khoản nhân viên';
			$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
			$db->query($history);
			move_uploaded_file($_FILES["image"]["tmp_name"], "anh_nhan_vien/" . $_FILES["image"]["name"]);
			$_SESSION['success'] = "Thêm Thành Công";
			new Redirect($_DOMAIN . 'taikhoan');
		} else {
			$_SESSION['success'] = "Thêm Thất Bại";
			new Redirect($_DOMAIN . 'taikhoan');
		}
	}
}
if (isset($_POST['add_hv'])) {
	$hoten = trim(addslashes(htmlspecialchars($_POST['hoten'])));
	$email = trim(addslashes(htmlspecialchars($_POST['email'])));
	$password = trim(addslashes(htmlspecialchars(md5($_POST['password']))));
	$ngay_sinh = trim(addslashes(htmlspecialchars($_POST['ngay_sinh'])));
	$sdt = trim(addslashes(htmlspecialchars($_POST['sdt'])));
	$dia_chi = trim(addslashes(htmlspecialchars($_POST['dia_chi'])));
	$trinh_do = trim(addslashes(htmlspecialchars($_POST['trinh_do'])));
	$chuc_vu = trim(addslashes(htmlspecialchars($_POST['chuc_vu'])));
	$image = $_FILES['image']['name'];
	mt_srand(mktime(1));
	$ma = 'HV-' . (mt_rand());
	$sql1 = "SELECT * FROM register WHERE phone='$sdt' or email='$email'";
	$sql = "INSERT INTO `register`
	(`email`, `password`, `username`, `usertype`, `status`, `user_code`, `address`, `phone`, `granduate`, `birth`, `img`) 
	VALUES ('$email','$password','$hoten','$chuc_vu','0','$ma','$dia_chi','$sdt','$trinh_do','$ngay_sinh','$image')";
	if ($db->num_rows($sql1) >= 1) {
		$_SESSION['success'] = "Thêm Thất Bại, Email Hoặc Số Điện Thoại Đã Tồn Tại!";
		new Redirect($_DOMAIN . 'taikhoan');
	} else {
		if (!$db->query($sql)) {
			//history log
			$user = $data_user['username'];
			$usertype = $data_user['usertype'];
			$action = '3';
			$date = date("d-m-Y");
			$time = date("H:i:s");
			$data = 'Thêm tài khoản học viên';
			$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
			$db->query($history);
			move_uploaded_file($_FILES["image"]["tmp_name"], "anh_nhan_vien/" . $_FILES["image"]["name"]);
			$_SESSION['success'] = "Thêm Thành Công";
			new Redirect($_DOMAIN . 'taikhoan');
		} else {
			$_SESSION['success'] = "Thêm Thất Bại";
			new Redirect($_DOMAIN . 'taikhoan');
		}
	}
}
if (isset($_POST['updatebtn'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$username = trim(addslashes(htmlspecialchars($_POST['edit_username'])));
	$email = trim(addslashes(htmlspecialchars($_POST['edit_email'])));
	$query = "UPDATE register SET username='$username', email='$email' WHERE id ='$id'";
	$query_run = $db->query($query);
	if (!$query_run) {
		//history log
		$user = $data_user['username'];
		$usertype = $data_user['usertype'];
		$action = '5';
		$date = date("d-m-Y");
		$time = date("H:i:s");
		$data = 'Cập nhật tài khoản';
		$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
		$db->query($history);
		# code...
		$_SESSION['success'] = "Cập nhật tài khoản thành công";
		new Redirect($_DOMAIN . 'taikhoan');
	} else {
		# code...
		$_SESSION['status'] = "Cập nhật tài khoản thất bại";
		new Redirect($_DOMAIN . 'taikhoan');
	}
}
if (isset($_POST['updatebtn_role'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$usertype_update = trim(addslashes(htmlspecialchars($_POST['update_usertype'])));
	$query = "UPDATE register SET usertype='$usertype_update' WHERE id ='$id'";
	$query_run = $db->query($query);
	if (!$query_run) {
		# code...
		//history log
		$user = $data_user['username'];
		$usertype = $data_user['usertype'];
		$action = '5';
		$date = date("d-m-Y");
		$time = date("H:i:s");
		$data = 'Sửa chức vụ cho tài khoản';
		$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
		$_SESSION['success'] = "Cập nhật tài khoản thành công";
		new Redirect($_DOMAIN . 'taikhoan');
	} else {
		# code...
		$_SESSION['status'] = "Cập nhật tài khoản thất bại";
		new Redirect($_DOMAIN . 'taikhoan');
	}
}
if (isset($_POST['updatebtn_pass'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$password = trim(addslashes(htmlspecialchars(md5($_POST['edit_password']))));
	$query = "UPDATE register SET password ='$password' WHERE id ='$id'";
	$query_run = $db->query($query);
	if (!$query_run) {
		//history log
		$user = $data_user['username'];
		$usertype = $data_user['usertype'];
		$action = '5';
		$date = date("d-m-Y");
		$time = date("H:i:s");
		$data = 'Đổi mật khẩu tài khoản';
		$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
		# code...
		$_SESSION['success'] = "Đổi mật khẩu tài khoản thành công";
		new Redirect($_DOMAIN . 'taikhoan');
	} else {
		# code...
		$_SESSION['status'] = "Đổi mật khẩu tài khoản thất bại";
		new Redirect($_DOMAIN . 'taikhoan');
	}
}
if (isset($_POST['mokhoa'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['mokhoa_id'])));
	$query = "UPDATE register SET status='0'  WHERE id ='$id'";
	$query_run = $db->query($query);
	if (!$query_run) {
		//history log
		$user = $data_user['username'];
		$usertype = $data_user['usertype'];
		$action = '5';
		$date = date("d-m-Y");
		$time = date("H:i:s");
		$data = 'Mở Khoá tài khoản tài khoản';
		$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
		# code...
		$_SESSION['success'] = "Mở Khóa tài khoản thành công";
		new Redirect($_DOMAIN . 'taikhoan');
	} else {
		# code...
		$_SESSION['status'] = "Mở Khóa tài khoản thất bại";
		new Redirect($_DOMAIN . 'taikhoan');
	}
}
if (isset($_POST['khoa'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['khoa_id'])));
	$query = "UPDATE register SET status='1'  WHERE id ='$id'";
	$query_run = $db->query($query);
	if (!$query_run) {
		# code...
		//history log
		$user = $data_user['username'];
		$usertype = $data_user['usertype'];
		$action = '5';
		$date = date("d-m-Y");
		$time = date("H:i:s");
		$data = 'Khoá tài khoản tài khoản';
		$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
		$_SESSION['success'] = "Khóa tài khoản thành công";
		new Redirect($_DOMAIN . 'taikhoan');
	} else {
		# code...
		$_SESSION['status'] = "Khóa tài khoản thất bại";
		new Redirect($_DOMAIN . 'taikhoan');
	}
}
if (isset($_POST['delete_btn'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['id'])));
	$query = "DELETE FROM register WHERE  id ='$id'";
	$query_run = $db->query($query);
	if (!$query_run) {
		# code...
		//history log
		$user = $data_user['username'];
		$usertype = $data_user['usertype'];
		$action = '5';
		$date = date("d-m-Y");
		$time = date("H:i:s");
		$data = 'Xoá tài khoản tài khoản';
		$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
		$_SESSION['success'] = "Xóa tài khoản thành công";
		new Redirect($_DOMAIN . 'taikhoan');
	} else {
		# code...
		$_SESSION['status'] = "Xóa tài hoản thất bại";
		new Redirect($_DOMAIN . 'taikhoan');
	}
}
