<?php
require_once 'core/init.php';
if (isset($_POST['add_tt'])) {
  $tua_de = trim(addslashes(htmlspecialchars($_POST['tua_de'])));
  $image = $_FILES['image']['name'];
  $tintuc = ($_POST['tin_tuc']);
  $url =  trim(addslashes(htmlspecialchars($_POST['url'])));
  $ten_url = trim(addslashes(htmlspecialchars($_POST['ten_url'])));
  $manhanvien = trim(addslashes(htmlspecialchars($_POST['ma_nhan_vien'])));
  $ngay_dang = trim(addslashes(htmlspecialchars($_POST['ngay_dang'])));
  $sql = "
      INSERT INTO tin_tuc(TuaDe,TinTuc,img_tt,url,ten_url,NgayDang,id_nv,TrangThai) 
      VALUES('$tua_de','$tintuc','$image','$url','$ten_url','$ngay_dang','$manhanvien','0')";
  if ($db->query($sql)) {
    $_SESSION['status'] = "Thêm Thất Bại";
    new Redirect($_DOMAIN . 'tintuc');
  } else {
    //history log
		$user = $data_user['username'];
		$usertype = $data_user['usertype'];
		$action = '3';
		$date = date("d-m-Y");
		$time = date("H:i:s");
		$data = 'Tin Tức';
		$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
    move_uploaded_file($_FILES["image"]["tmp_name"], "anh_nhan_vien/" . $_FILES["image"]["name"]);
    $_SESSION['success'] = "Thêm Thành Công ";
    new Redirect($_DOMAIN . 'tintuc');
  }
}
if (isset($_POST['update_btn'])) {
  $id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
  $edit_tuade = trim(addslashes(htmlspecialchars($_POST['edit_tuade'])));
  $edit_tintuc = trim(addslashes(htmlspecialchars($_POST['edit_tintuc'])));
  $edit_url = trim(addslashes(htmlspecialchars($_POST['edit_url'])));
  $edit_ngay_dang = trim(addslashes(htmlspecialchars($_POST['edit_ngay_dang'])));
  $edit_ten_url = trim(addslashes(htmlspecialchars($_POST['edit_ten_url'])));
  $query = "
    UPDATE tin_tuc
    SET TuaDe ='$edit_tuade',
        TinTuc ='$edit_tintuc',         
        url='$edit_url',
		ten_url='$edit_ten_url',
		NgayDang='$edit_ngay_dang',
		TrangThai='0'
    WHERE id_tt ='$id'";
  if ($db->query($query)) {
    $_SESSION['status'] = "Sửa Thất Bại";
    new Redirect($_DOMAIN . 'tintuc');
  } else {
    //history log
		$user = $data_user['username'];
		$usertype = $data_user['usertype'];
		$action = '5';
		$date = date("d-m-Y");
		$time = date("H:i:s");
		$data = 'Tin Tức';
		$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
    $_SESSION['success'] = "Sửa Thành Công";
    new Redirect($_DOMAIN . 'tintuc');
  }
}
if (isset($_POST['update_img'])) {
  $id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
  $edit_image = $_FILES['edit_image']['name'];
  $query = "
    UPDATE tin_tuc
    SET img_tt='$edit_image', 
		TrangThai='0'
    WHERE id_tt ='$id'";
  if ($db->query($query)) {
    $_SESSION['status'] = "Sửa Thất Bại";
    new Redirect($_DOMAIN . 'tintuc');
  } else {
    //history log
		$user = $data_user['username'];
		$usertype = $data_user['usertype'];
		$action = '5';
		$date = date("d-m-Y");
		$time = date("H:i:s");
		$data = 'Ảnh Tin Tức';
		$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
    move_uploaded_file($_FILES["edit_image"]["tmp_name"], "anh_nhan_vien/" . $_FILES["edit_image"]["name"]);
    $_SESSION['success'] = "Sửa Thành Công";
    new Redirect($_DOMAIN . 'tintuc');
  }
}
if (isset($_POST['delete_btn'])) {
  $id = $_POST['delete_id'];
  $sql = "DELETE FROM tin_tuc WHERE  id_tt ='$id'";
  if ($db->query($sql)) {
    $_SESSION['status'] = "Xóa Thất Bại";
    new Redirect($_DOMAIN . 'tintuc');
  } else {
    //history log
		$user = $data_user['username'];
		$usertype = $data_user['usertype'];
		$action = '4';
		$date = date("d-m-Y");
		$time = date("H:i:s");
		$data = 'Tin Tức';
		$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
    $_SESSION['success'] = "Xóa Thành Công";
    new Redirect($_DOMAIN . 'tintuc');
  }
}
