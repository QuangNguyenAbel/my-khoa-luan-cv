<?php
require_once 'core/init.php';
if (isset($_POST['update_btn'])) {
  $id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
  $ten_nhan_vien = trim(addslashes(htmlspecialchars($_POST['ten_nhan_vien'])));
  $dia_chi = trim(addslashes(htmlspecialchars($_POST['dia_chi'])));
  $sdt = trim(addslashes(htmlspecialchars($_POST['sdt'])));
  $email = trim(addslashes(htmlspecialchars($_POST['email'])));
  $trinh_do =   trim(addslashes(htmlspecialchars($_POST['trinh_do'])));
  $ngay_sinh = trim(addslashes(htmlspecialchars($_POST['ngay_sinh'])));
  $ma_nhan_vien = trim(addslashes(htmlspecialchars($_POST['ma_nhan_vien'])));
  $query = "
    UPDATE `register` SET 
    `username`='$ten_nhan_vien',
    `email`='$email',
    `user_code`='$ma_nhan_vien',
    `address`='$dia_chi',
    `phone`='$sdt',
    `granduate`='$trinh_do',
    `birth`='$ngay_sinh'
     WHERE id ='$id'";
  $query_run = $db->query($query);
  
  if (!$query_run) {
    $_SESSION['success'] = "Sửa Thành Công";
    new Redirect($_DOMAIN . 'hocvien');
  } else {
    $_SESSION['status'] = "Sửa Thất Bại";
    new Redirect($_DOMAIN . 'hocvien');
  }
}
if (isset($_POST['update_img'])) {
  $id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
  $image = $_FILES['image']['name'];
  $query = "
    UPDATE register 
    SET img='$image' 
    WHERE id ='$id'";
  $query_run = $db->query($query);
  
  if (!$query_run) {
    //history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '5';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Sửa Ảnh Học Viên';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
    $db->query($history);
    move_uploaded_file($_FILES["image"]["tmp_name"], "anh_nhan_vien/" . $_FILES["image"]["name"]);
    $_SESSION['success'] = "Sửa Thành Công ";
    new Redirect($_DOMAIN . 'hocvien');
  } else {

    $_SESSION['status'] = "Sửa Thất Bại";
    new Redirect($_DOMAIN . 'hocvien');
  }
}
if (isset($_POST['delete_btn'])) {
  $id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
  $query = "DELETE FROM register WHERE  id ='$id'";
  $query_run = $db->query($query);
  if (!$query_run) {
    //history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '4';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Xoá Học Viên';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
    $db->query($history);
    $_SESSION['success'] = "Xóa Thành Công";
    new Redirect($_DOMAIN . 'hocvien');
  } else {
    $_SESSION['status'] = "Xóa Thất Bại";
    new Redirect($_DOMAIN . 'hocvien');
  }
}
if (isset($_POST['nhap_diem'])) {
  $id_lop = $_POST['id_lop'];
  $id_hv = $_POST['id_hv'];
  $diem = $_POST['diem'];
  $count = count($_POST['id_hv']);
  for ($i = 0; $i < $count; $i++) {
    $query = "
      UPDATE `chi_tiet_lop_hoc` SET `diem`='$diem[$i]'
      WHERE `id_hs`='$id_hv[$i]' and `id_lop`='$id_lop'";
    !$db->query($query);
  }
  //history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '9';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = '';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
  $db->query($history);
  $_SESSION['success'] = "Sửa Thành Công ";
  new Redirect($_DOMAIN . 'lophoc');
}
//điểm danh 15
if (isset($_POST['diem_danh15']) && isset($_POST['diem_danh15']) != "") {
  $id_lop = $_POST['id_lop'];
  $id_hv = $_POST['id_hv'];
  //date
  $d1 = $_POST['d1'];
  $d2 = $_POST['d2'];
  $d3 = $_POST['d3'];
  $d4 = $_POST['d4'];
  $d5 = $_POST['d5'];
  $d6 = $_POST['d6'];
  $d7 = $_POST['d7'];
  $d8 = $_POST['d8'];
  $d9 = $_POST['d9'];
  $d10 = $_POST['d10'];
  $d11 = $_POST['d11'];
  $d12 = $_POST['d12'];
  $d13 = $_POST['d13'];
  $d14 = $_POST['d14'];
  $d15 = $_POST['d15'];
  //điểm danh
  $dd1 = $_POST['dd1'];
  $dd2 = $_POST['dd2'];
  $dd3 = $_POST['dd3'];
  $dd4 = $_POST['dd4'];
  $dd5 = $_POST['dd5'];
  $dd6 = $_POST['dd6'];
  $dd7 = $_POST['dd7'];
  $dd8 = $_POST['dd8'];
  $dd9 = $_POST['dd9'];
  $dd10 = $_POST['dd10'];
  $dd11 = $_POST['dd11'];
  $dd12 = $_POST['dd12'];
  $dd13 = $_POST['dd13'];
  $dd14 = $_POST['dd14'];
  $dd15 = $_POST['dd15'];
  $thi = $_POST['thi'];
  //đếm
  $count = count($_POST['id_hv']);
  for ($i = 0; $i < $count; $i++) {
    $diem_danh = "
      UPDATE `chi_tiet_lop_hoc` 
      SET 
      `1`= '$dd1[$i]', 
      `2`= '$dd2[$i]', 
      `3`= '$dd3[$i]', 
      `4`= '$dd4[$i]', 
      `5`= '$dd5[$i]', 
      `6`= '$dd6[$i]', 
      `7`= '$dd7[$i]',
      `8`= '$dd8[$i]',
      `9`= '$dd9[$i]', 
      `10`= '$dd10[$i]', 
      `11`= '$dd11[$i]', 
      `12`= '$dd12[$i]', 
      `13`= '$dd13[$i]', 
      `14`= '$dd14[$i]', 
      `15`= '$dd15[$i]',
      `thi`= '$thi[$i]'
      WHERE `id_hs`='$id_hv[$i]' and `id_lop`='$id_lop'";
    !$db->query($diem_danh);
  }
  $ngay_diemdanh = "UPDATE `lop_hoc` 
                         SET 
                         `d1` = '$d1', 
                         `d2` = '$d2', 
                         `d3` = '$d3', 
                         `d4` = '$d4', 
                         `d5` = '$d5', 
                         `d6` = '$d6', 
                         `d7` = '$d7', 
                         `d8` = '$d8', 
                         `d9` = '$d9', 
                         `d10`= '$d10', 
                         `d11`= '$d11', 
                         `d12`= '$d12', 
                         `d13`= '$d13', 
                         `d14`= '$d14', 
                         `d15`= '$d15'
                         WHERE id_lop = $id_lop";
  !$db->query($ngay_diemdanh);
  //history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '10';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = '';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
  $db->query($history);
  $_SESSION['success'] = "Điểm Danh Thành Công";
  new Redirect($_DOMAIN . 'lophoc');
}
//điểm danh thi
if (isset($_POST['diem_danh_thi']) && isset($_POST['diem_danh_thi']) != "") {
  $id_lop = $_POST['id_lop'];
  $id_hv = $_POST['id_hv'];
  //điểm danh
  $thi = $_POST['thi'];
  //đếm
  $count = count($_POST['id_hv']);
  for ($i = 0; $i < $count; $i++) {
    $diem_danh = "
      UPDATE `chi_tiet_lop_hoc` 
      SET 
      `thi`= '$thi[$i]'
      WHERE `id_hs`='$id_hv[$i]' and `id_lop`='$id_lop'";
    !$db->query($diem_danh);
    
  }
  //history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '10';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = '';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
  $db->query($history);
  $_SESSION['success'] = "Điểm Danh Thành Công";
  new Redirect($_DOMAIN . 'lophoc');
}
//điểm danh 12
if (isset($_POST['diem_danh12']) && isset($_POST['diem_danh12']) != "") {
  $id_lop = $_POST['id_lop'];
  $id_hv = $_POST['id_hv'];
  //date
  $d1 = $_POST['d1'];
  $d2 = $_POST['d2'];
  $d3 = $_POST['d3'];
  $d4 = $_POST['d4'];
  $d5 = $_POST['d5'];
  $d6 = $_POST['d6'];
  $d7 = $_POST['d7'];
  $d8 = $_POST['d8'];
  $d9 = $_POST['d9'];
  $d10 = $_POST['d10'];
  $d11 = $_POST['d11'];
  $d12 = $_POST['d12'];

  //điểm danh
  $dd1 = $_POST['dd1'];
  $dd2 = $_POST['dd2'];
  $dd3 = $_POST['dd3'];
  $dd4 = $_POST['dd4'];
  $dd5 = $_POST['dd5'];
  $dd6 = $_POST['dd6'];
  $dd7 = $_POST['dd7'];
  $dd8 = $_POST['dd8'];
  $dd9 = $_POST['dd9'];
  $dd10 = $_POST['dd10'];
  $dd11 = $_POST['dd11'];
  $dd12 = $_POST['dd12'];

  $thi = $_POST['thi'];
  //đếm
  $count = count($_POST['id_hv']);
  for ($i = 0; $i < $count; $i++) {
    $diem_danh = "
      UPDATE `chi_tiet_lop_hoc` 
      SET 
      `1`= '$dd1[$i]', 
      `2`= '$dd2[$i]', 
      `3`= '$dd3[$i]', 
      `4`= '$dd4[$i]', 
      `5`= '$dd5[$i]', 
      `6`= '$dd6[$i]', 
      `7`= '$dd7[$i]',
      `8`= '$dd8[$i]',
      `9`= '$dd9[$i]', 
      `10`= '$dd10[$i]', 
      `11`= '$dd11[$i]', 
      `12`= '$dd12[$i]', 

      `thi`= '$thi[$i]'
      WHERE `id_hs`='$id_hv[$i]' and `id_lop`='$id_lop'";
    !$db->query($diem_danh);
  }
  $ngay_diemdanh = "UPDATE `lop_hoc` 
                         SET 
                         `d1` = '$d1', 
                         `d2` = '$d2', 
                         `d3` = '$d3', 
                         `d4` = '$d4', 
                         `d5` = '$d5', 
                         `d6` = '$d6', 
                         `d7` = '$d7', 
                         `d8` = '$d8', 
                         `d9` = '$d9', 
                         `d10`= '$d10', 
                         `d11`= '$d11', 
                         `d12`= '$d12'
                         WHERE id_lop = $id_lop";
  !$db->query($ngay_diemdanh);
  //history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '10';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = '';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
  $db->query($history);
  $_SESSION['success'] = "Điểm Danh Thành Công";
  new Redirect($_DOMAIN . 'lophoc');
}
//điểm danh 10
if (isset($_POST['diem_danh10']) && isset($_POST['diem_danh10']) != "") {
  $id_lop = $_POST['id_lop'];
  $id_hv = $_POST['id_hv'];
  //date
  $d1 = $_POST['d1'];
  $d2 = $_POST['d2'];
  $d3 = $_POST['d3'];
  $d4 = $_POST['d4'];
  $d5 = $_POST['d5'];
  $d6 = $_POST['d6'];
  $d7 = $_POST['d7'];
  $d8 = $_POST['d8'];
  $d9 = $_POST['d9'];
  $d10 = $_POST['d10'];

  //điểm danh
  $dd1 = $_POST['dd1'];
  $dd2 = $_POST['dd2'];
  $dd3 = $_POST['dd3'];
  $dd4 = $_POST['dd4'];
  $dd5 = $_POST['dd5'];
  $dd6 = $_POST['dd6'];
  $dd7 = $_POST['dd7'];
  $dd8 = $_POST['dd8'];
  $dd9 = $_POST['dd9'];
  $dd10 = $_POST['dd10'];


  $thi = $_POST['thi'];
  //đếm
  $count = count($_POST['id_hv']);
  for ($i = 0; $i < $count; $i++) {
    $diem_danh = "
      UPDATE `chi_tiet_lop_hoc` 
      SET 
      `1`= '$dd1[$i]', 
      `2`= '$dd2[$i]', 
      `3`= '$dd3[$i]', 
      `4`= '$dd4[$i]', 
      `5`= '$dd5[$i]', 
      `6`= '$dd6[$i]', 
      `7`= '$dd7[$i]',
      `8`= '$dd8[$i]',
      `9`= '$dd9[$i]', 
      `10`= '$dd10[$i]', 


      `thi`= '$thi[$i]'
      WHERE `id_hs`='$id_hv[$i]' and `id_lop`='$id_lop'";
    !$db->query($diem_danh);
  }
  $ngay_diemdanh = "UPDATE `lop_hoc` 
                         SET 
                         `d1` = '$d1', 
                         `d2` = '$d2', 
                         `d3` = '$d3', 
                         `d4` = '$d4', 
                         `d5` = '$d5', 
                         `d6` = '$d6', 
                         `d7` = '$d7', 
                         `d8` = '$d8', 
                         `d9` = '$d9', 
                         `d10`= '$d10'
                         WHERE id_lop = $id_lop";
  !$db->query($ngay_diemdanh);
  //history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '10';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = '';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
  $db->query($history);
  $_SESSION['success'] = "Điểm Danh Thành Công";
  new Redirect($_DOMAIN . 'lophoc');
}
//điểm danh 8
if (isset($_POST['diem_danh8']) && isset($_POST['diem_danh8']) != "") {
  $id_lop = $_POST['id_lop'];
  $id_hv = $_POST['id_hv'];
  //date
  $d1 = $_POST['d1'];
  $d2 = $_POST['d2'];
  $d3 = $_POST['d3'];
  $d4 = $_POST['d4'];
  $d5 = $_POST['d5'];
  $d6 = $_POST['d6'];
  $d7 = $_POST['d7'];
  $d8 = $_POST['d8'];


  //điểm danh
  $dd1 = $_POST['dd1'];
  $dd2 = $_POST['dd2'];
  $dd3 = $_POST['dd3'];
  $dd4 = $_POST['dd4'];
  $dd5 = $_POST['dd5'];
  $dd6 = $_POST['dd6'];
  $dd7 = $_POST['dd7'];
  $dd8 = $_POST['dd8'];


  $thi = $_POST['thi'];
  //đếm
  $count = count($_POST['id_hv']);
  for ($i = 0; $i < $count; $i++) {
    $diem_danh = "
      UPDATE `chi_tiet_lop_hoc` 
      SET 
      `1`= '$dd1[$i]', 
      `2`= '$dd2[$i]', 
      `3`= '$dd3[$i]', 
      `4`= '$dd4[$i]', 
      `5`= '$dd5[$i]', 
      `6`= '$dd6[$i]', 
      `7`= '$dd7[$i]',
      `8`= '$dd8[$i]',


      `thi`= '$thi[$i]'
      WHERE `id_hs`='$id_hv[$i]' and `id_lop`='$id_lop'";
    !$db->query($diem_danh);
  }
  $ngay_diemdanh = "UPDATE `lop_hoc` 
                         SET 
                         `d1` = '$d1', 
                         `d2` = '$d2', 
                         `d3` = '$d3', 
                         `d4` = '$d4', 
                         `d5` = '$d5', 
                         `d6` = '$d6', 
                         `d7` = '$d7', 
                         `d8` = '$d8'
                         WHERE id_lop = $id_lop";
  !$db->query($ngay_diemdanh);
  //history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '10';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = '';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
  $db->query($history);
  $_SESSION['success'] = "Điểm Danh Thành Công";
  new Redirect($_DOMAIN . 'lophoc');
}
//điểm danh 6
if (isset($_POST['diem_danh6']) && isset($_POST['diem_danh6']) != "") {
  $id_lop = $_POST['id_lop'];
  $id_hv = $_POST['id_hv'];
  //date
  $d1 = $_POST['d1'];
  $d2 = $_POST['d2'];
  $d3 = $_POST['d3'];
  $d4 = $_POST['d4'];
  $d5 = $_POST['d5'];
  $d6 = $_POST['d6'];


  //điểm danh
  $dd1 = $_POST['dd1'];
  $dd2 = $_POST['dd2'];
  $dd3 = $_POST['dd3'];
  $dd4 = $_POST['dd4'];
  $dd5 = $_POST['dd5'];
  $dd6 = $_POST['dd6'];


  $thi = $_POST['thi'];
  //đếm
  $count = count($_POST['id_hv']);
  for ($i = 0; $i < $count; $i++) {
    $diem_danh = "
      UPDATE `chi_tiet_lop_hoc` 
      SET 
      `1`= '$dd1[$i]', 
      `2`= '$dd2[$i]', 
      `3`= '$dd3[$i]', 
      `4`= '$dd4[$i]', 
      `5`= '$dd5[$i]', 
      `6`= '$dd6[$i]',  
      `thi`= '$thi[$i]'
      WHERE `id_hs`='$id_hv[$i]' and `id_lop`='$id_lop'";
    !$db->query($diem_danh);
  }
  $ngay_diemdanh = "UPDATE `lop_hoc` 
                         SET 
                         `d1` = '$d1', 
                         `d2` = '$d2', 
                         `d3` = '$d3', 
                         `d4` = '$d4', 
                         `d5` = '$d5', 
                         `d6` = '$d6'
                         WHERE id_lop = $id_lop";
  !$db->query($ngay_diemdanh);
  //history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '10';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = '';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
  $db->query($history);
  $_SESSION['success'] = "Điểm Danh Thành Công";
  new Redirect($_DOMAIN . 'lophoc');
}
//điểm danh 4
if (isset($_POST['diem_danh4']) && isset($_POST['diem_danh4']) != "") {
  $id_lop = $_POST['id_lop'];
  $id_hv = $_POST['id_hv'];
  //date
  $d1 = $_POST['d1'];
  $d2 = $_POST['d2'];
  $d3 = $_POST['d3'];
  $d4 = $_POST['d4'];


  //điểm danh
  $dd1 = $_POST['dd1'];
  $dd2 = $_POST['dd2'];
  $dd3 = $_POST['dd3'];
  $dd4 = $_POST['dd4'];


  $thi = $_POST['thi'];
  //đếm
  $count = count($_POST['id_hv']);
  for ($i = 0; $i < $count; $i++) {
    $diem_danh = "
      UPDATE `chi_tiet_lop_hoc` 
      SET 
      `1`= '$dd1[$i]', 
      `2`= '$dd2[$i]', 
      `3`= '$dd3[$i]', 
      `4`= '$dd4[$i]',

      `thi`= '$thi[$i]'
      WHERE `id_hs`='$id_hv[$i]' and `id_lop`='$id_lop'";
    !$db->query($diem_danh);
  }
  $ngay_diemdanh = "UPDATE `lop_hoc` 
                         SET 
                         `d1` = '$d1', 
                         `d2` = '$d2', 
                         `d3` = '$d3', 
                         `d4` = '$d4'
                         WHERE id_lop = $id_lop";
  !$db->query($ngay_diemdanh);
  //history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '10';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = '';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
  $db->query($history);
  $_SESSION['success'] = "Điểm Danh Thành Công";
  new Redirect($_DOMAIN . 'lophoc');
}
//điểm danh 5
if (isset($_POST['diem_danh5']) && isset($_POST['diem_danh5']) != "") {
  $id_lop = $_POST['id_lop'];
  $id_hv = $_POST['id_hv'];
  //date
  $d1 = $_POST['d1'];
  $d2 = $_POST['d2'];
  $d3 = $_POST['d3'];
  $d4 = $_POST['d4'];
  $d5 = $_POST['d5'];

  //điểm danh
  $dd1 = $_POST['dd1'];
  $dd2 = $_POST['dd2'];
  $dd3 = $_POST['dd3'];
  $dd4 = $_POST['dd4'];
  $dd5 = $_POST['dd5'];


  $thi = $_POST['thi'];
  //đếm
  $count = count($_POST['id_hv']);
  for ($i = 0; $i < $count; $i++) {
    $diem_danh = "
      UPDATE `chi_tiet_lop_hoc` 
      SET 
      `1`= '$dd1[$i]', 
      `2`= '$dd2[$i]', 
      `3`= '$dd3[$i]', 
      `4`= '$dd4[$i]', 
      `5`= '$dd5[$i]'

      `thi`= '$thi[$i]'
      WHERE `id_hs`='$id_hv[$i]' and `id_lop`='$id_lop'";
    !$db->query($diem_danh);
    
  }
  $ngay_diemdanh = "UPDATE `lop_hoc` 
                         SET 
                         `d1` = '$d1', 
                         `d2` = '$d2', 
                         `d3` = '$d3', 
                         `d4` = '$d4', 
                         `d5` = '$d5'
                         WHERE id_lop = $id_lop";
  !$db->query($ngay_diemdanh);
  //history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '10';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = '';
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
  $db->query($history);
  $_SESSION['success'] = "Điểm Danh Thành Công";
  new Redirect($_DOMAIN . 'lophoc');
}

