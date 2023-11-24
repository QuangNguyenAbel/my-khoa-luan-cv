<?php
require_once 'core/init.php';
if (isset($_POST['addchi_btn'])) {
  # code...
  $ngay_thang =  trim(addslashes(htmlspecialchars($_POST['ngay_thang'])));
  $thu_chi = trim(addslashes(htmlspecialchars($_POST['thu_chi'])));
  $loai =   trim(addslashes(htmlspecialchars($_POST['loai'])));
  $id_nguoi = trim(addslashes(htmlspecialchars($_POST['id_nguoi'])));
  $noi_dung = trim(addslashes(htmlspecialchars($_POST['noi_dung'])));
  $tien_thu = 0;
  $tien_chi = trim(addslashes(htmlspecialchars($_POST['tien_chi'])));
  $ghi_chu = trim(addslashes(htmlspecialchars($_POST['ghi_chu'])));
  $luy_ke = $tien_thu - $tien_chi;
  $year = date('Y', strtotime($ngay_thang));
  $month = date('m', strtotime($ngay_thang));
  if ($month == '01' || $month == '02' || $month == '03') {
    $quy = 1;
  } elseif ($month == '04' || $month == '05' || $month == '06') {
    $quy = 2;
  } elseif ($month == '07' || $month == '08' || $month == '09') {
    $quy = 3;
  } else $quy = 4;
  $search1 = '-';
  $replace1 = '';
  $date = str_replace($search1, $replace1, $ngay_thang);
  $query = "INSERT INTO 
  `thu_chi`(`NgayThang`, `ThuChi`, `NoiDung`, `SoTienThu`, `SoTienChi`, `LuyKe`, `GhiChu`, `Nam`, `Thang`, `Quy`, `loai`, `id_nv`) 
  VALUES('$ngay_thang','$thu_chi','$noi_dung','$tien_thu','$tien_chi','$luy_ke','$ghi_chu','$year','$month','$quy','$loai','$id_nguoi')";
  $query_run = $db->query($query);
  //history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '3';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Chi Phi';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
  if (!$query_run) {
    $db->query($history);
    $_SESSION['success'] = "Thêm Thành Công ";
    new Redirect($_DOMAIN . 'doanhthu');
  } else {
    $_SESSION['status'] = "Thêm Thất Bại";
    new Redirect($_DOMAIN . 'doanhthu');
  }
}
if (isset($_POST['update_btn'])) {
  $id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
  # code...
  $noi_dung = trim(addslashes(htmlspecialchars($_POST['noi_dung'])));
  $tien_chi = trim(addslashes(htmlspecialchars($_POST['tien_chi'])));
  $ghi_chu = trim(addslashes(htmlspecialchars($_POST['ghi_chu'])));
  $luy_ke = 0 - $tien_chi;
  $query = "UPDATE thu_chi
 				SET 
 				SoTienChi ='$tien_chi',
        LuyKe ='$luy_ke',
        NoiDung ='$noi_dung',
 				GhiChu = '$ghi_chu'
 				WHERE id_thuchi ='$id'";
  $query_run = $db->query($query);
  //history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '5';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Chi Phi';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
  if (!$query_run) {
    $db->query($history);
    $_SESSION['success'] = "Sửa Thành Công ";
    new Redirect($_DOMAIN . 'doanhthu');
  } else {
    $_SESSION['status'] = "Sửa Thất Bại";
    new Redirect($_DOMAIN . 'doanhthu');
  }
}
if (isset($_POST['delete_btn'])) {
  $id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
  $query = "DELETE FROM thu_chi
 				 WHERE  id_thuchi ='$id'";
          //history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '4';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Chi Phi';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
  $query_run = $db->query($query);
  if (!$query_run) {
    # code...
    $db->query($history);
    $_SESSION['success'] = "Xóa Thành Công";
    new Redirect($_DOMAIN . 'doanhthu');
  } else {
    # code...
    $_SESSION['status'] = "Xóa Thất Bại";
    new Redirect($_DOMAIN . 'doanhthu');
  }
}
