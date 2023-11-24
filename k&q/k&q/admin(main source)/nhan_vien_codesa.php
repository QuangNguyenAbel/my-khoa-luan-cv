<?php 
require_once 'core/init.php';
if(isset($_POST['update_btn']))
 {
    $id =trim(addslashes(htmlspecialchars($_POST['edit_id'])));
    $ten_nhan_vien = trim(addslashes(htmlspecialchars($_POST['ten_nhan_vien'])));
    $dia_chi = trim(addslashes(htmlspecialchars($_POST['dia_chi'])));
    $sdt = trim(addslashes(htmlspecialchars($_POST['sdt'])));
    $email = trim(addslashes(htmlspecialchars($_POST['email'])));
    $trinh_do =   trim(addslashes(htmlspecialchars($_POST['trinh_do'])));
    $ngay_sinh=trim(addslashes(htmlspecialchars($_POST['ngay_sinh'])));
    $ma_nhan_vien=trim(addslashes(htmlspecialchars($_POST['ma_nhan_vien'])));
    $query= "
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
        $_SESSION['success']="Sửa Thành Công";
        new Redirect($_DOMAIN.'nhanvien');
    } else {
      $_SESSION['status']= "Sửa Thất Bại";
      new Redirect($_DOMAIN.'nhanvien');
    }
 }
  if(isset($_POST['update_img']))
 {
	  $id =trim(addslashes(htmlspecialchars($_POST['edit_id'])));
    $image = $_FILES['image']['name'];
    $query= "
    UPDATE register 
    SET img='$image' 
    WHERE id ='$id'";
    $query_run = $db->query($query);
    if (!$query_run) {
        move_uploaded_file($_FILES["image"]["tmp_name"],"anh_nhan_vien/".$_FILES["image"]["name"]);
        $_SESSION['success']="Sửa Thành Công";
        new Redirect($_DOMAIN.'nhanvien');
    } else {
  
      $_SESSION['status']= "Sửa Thất Bại";
      new Redirect($_DOMAIN.'nhanvien');
    }
 }
  if(isset($_POST['delete_btn']))
 {
    $id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
    $query= "DELETE FROM register WHERE  id ='$id'";
    $query_run = $db->query($query);
    if (!$query_run) {
      $_SESSION['success']= "Xóa Thành Công";
      new Redirect($_DOMAIN.'nhanvien');
    } else {
      $_SESSION['status']= "Xóa Thất Bại";
      new Redirect($_DOMAIN.'nhanvien');
    }
 }
