<?php
require_once 'core/init.php';
if (isset($_POST['update_btn'])) {
  $id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
  $content_web = trim(addslashes(htmlspecialchars($_POST['content'])));
  $sql = "UPDATE gioi_thieu SET Content ='$content_web' WHERE id ='$id'";
  //history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '5';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Chỉnh sửa trang giới thiệu';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
  $query_run = $db->query($sql);
  if (!$query_run) {
    $db->query($history);
    $_SESSION['success'] = "Sửa Thành Công";
    new Redirect($_DOMAIN . 'gioithieu');
  } else {
    $_SESSION['status'] = "Sửa Thất Bại";
    new Redirect($_DOMAIN . 'gioithieu');
  }
}
