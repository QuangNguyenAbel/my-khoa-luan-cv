<?php
require_once 'core/init.php';
if (isset($_POST['add_tl'])) {
  $tua_de = trim(addslashes(htmlspecialchars($_POST['tua_de'])));
  $id_lop = trim(addslashes(htmlspecialchars($_POST['id_lop'])));
  $image = $_FILES['image']['name'];
  $tom_tat = trim(addslashes(htmlspecialchars($_POST['tom_tat'])));
  $ngay_dang = trim(addslashes(htmlspecialchars($_POST['ngay_dang'])));
  $ma_nhan_vien = trim(addslashes(htmlspecialchars($_POST['id_nv'])));
  //history log
  $user = $data_user['username'];
  $usertype = $data_user['usertype'];
  $action = '3';
  $date = date("d-m-Y");
  $time = date("H:i:s");
  $data = 'Tài Liệu';
  $history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

  $query = "INSERT INTO `tai_lieu`(`TuaDe`, `TomTat`, `file`, `NgayDang`, `id_lop`, `TrangThai`, `id_nv`) 
  VALUES ('$tua_de','$tom_tat','$image','$ngay_dang','$id_lop','0','$ma_nhan_vien')";
  $query_run = $db->query($query);
  if ($query_run) {
    $_SESSION['status'] = "Thêm Thất Bại";
    new Redirect($_DOMAIN . 'tailieu');
  } else {
    move_uploaded_file($_FILES["image"]["tmp_name"], "anh_nhan_vien/" . $_FILES["image"]["name"]);
    $db->query($history);
    $_SESSION['success'] = "Thêm Thành Công ";
    new Redirect($_DOMAIN . 'tailieu');
  }
}
if (isset($_POST['update_btn'])) {
  $id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
  $td = trim(addslashes(htmlspecialchars($_POST['edit_tuade'])));
  $tt = trim(addslashes(htmlspecialchars($_POST['edit_tomtat'])));
  $query = "
    UPDATE tai_lieu
    SET TuaDe ='$td',
        TomTat ='$tt', 
		TrangThai='0'
    WHERE id_tailieu ='$id'";
  $query_run = $db->query($query);
  //history log
  $user = $data_user['username'];
  $usertype = $data_user['usertype'];
  $action = '5';
  $date = date("d-m-Y");
  $time = date("H:i:s");
  $data = 'Tài Liệu';
  $history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

  if ($query_run) {
    $_SESSION['status'] = "Sửa Thất Bại";
    new Redirect($_DOMAIN . 'tailieu');
  } else {
    $db->query($history);
    $_SESSION['success'] = "Sửa Thành Công";
    new Redirect($_DOMAIN . 'tailieu');
  }
}
if (isset($_POST['update_file'])) {
  $id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
  $img = $_FILES['edit_image']['name'];
  $query = "
    UPDATE tai_lieu
    SET 
        file='$img', 
		TrangThai='0'
    WHERE id_tailieu ='$id'";
  $query_run = $db->query($query);
  //history log
  $user = $data_user['username'];
  $usertype = $data_user['usertype'];
  $action = '5';
  $date = date("d-m-Y");
  $time = date("H:i:s");
  $data = 'Ảnh Tài Liệu';
  $history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";

  if ($query_run) {
    $_SESSION['status'] = "Sửa Thất Bại";
    new Redirect($_DOMAIN . 'tailieu');
  } else {
    $db->query($history);
    move_uploaded_file($_FILES["edit_image"]["tmp_name"], "anh_nhan_vien/" . $_FILES["edit_image"]["name"]);
    $_SESSION['success'] = "Sửa Thành Công";
    new Redirect($_DOMAIN . 'tailieu');
  }
}
if (isset($_POST['delete_btn'])) {
  $id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
  $query = "DELETE FROM tai_lieu WHERE  id_tailieu ='$id'";
  $query_run = $db->query($query);
  //history log
  $user = $data_user['username'];
  $usertype = $data_user['usertype'];
  $action = '4';
  $date = date("d-m-Y");
  $time = date("H:i:s");
  $data = 'Tài Liệu';
  $history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
  if ($query_run) {
    $_SESSION['status'] = "Xóa Thất Bại";
    new Redirect($_DOMAIN . 'tailieu');
  } else {
    $db->query($history);
    $_SESSION['success'] = "Xóa Thành Công";
    new Redirect($_DOMAIN . 'tailieu');
  }
}
