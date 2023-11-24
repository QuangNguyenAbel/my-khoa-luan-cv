<?php
require_once 'core/init.php';
if (isset($_POST['add_all_hs'])) {
  $ma_lop = trim(addslashes(htmlspecialchars($_POST['ma_lop'])));
  $query = "INSERT INTO hoc_sinh(TenHocSinh,Lop,DiaChi,tinhtrang,SDT,id_lop,email) 
		SELECT HoTen,'$ma_lop',DiaChi,'Đang Học',Sdt,(SELECT id FROM lop_hoc WHERE MaLop='$ma_lop'),Email 
		FROM khach_hang_dang_ky WHERE ma_lop='$ma_lop')";
  $query1 = "update khach_hang_dang_ky set trang_thai='1' where ma_lop='$ma_lop'";
  $query_run = $db->query($query);
  $query1_run = mysqli_query($connection, $query1);
  if ($query_run && $query1_run) {
    $_SESSION['status'] = "Thêm Thất Bại";
    new Redirect($_DOMAIN . 'quanlykhoahoc');
  } else {
    $_SESSION['success'] = "Thêm Thành Công";
    new Redirect($_DOMAIN . 'quanlykhoahoc');
  }
}
if (isset($_POST['add_hs'])) {
  $ten_hs =  trim(addslashes(htmlspecialchars($_POST['hoten'])));
  $lop = trim(addslashes(htmlspecialchars($_POST['ma_lop'])));
  $sdt = trim(addslashes(htmlspecialchars($_POST['sdt'])));
  $dia_chi = trim(addslashes(htmlspecialchars($_POST['diachi'])));
  $email = trim(addslashes(htmlspecialchars($_POST['email'])));
  $id = trim(addslashes(htmlspecialchars($_POST['id_kh'])));
  $query = "INSERT INTO hoc_sinh(TenHocSinh,Lop,SDT,DiaChi,tinhtrang,id_lop,email) 
  VALUES('$ten_hs','$lop','$sdt','$dia_chi','Đang Học',(SELECT id from lop_hoc WHERE MaLop='$lop'),'$email')";
  $query1 = "update khach_hang_dang_ky set trang_thai='1' where id='$id'";
  $query_run = $db->query($query);
  $query1_run = $db->query($query1);
  if ($query_run && $query1_run) {
    $_SESSION['status'] = "Thêm Thất Bại";
    new Redirect($_DOMAIN . 'quanlykhoahoc');
  } else {
    $_SESSION['success'] = "Thêm Thành Công";
    new Redirect($_DOMAIN . 'quanlykhoahoc');
  }
}
if (isset($_POST['add_kh'])) {
  $ten = trim(addslashes(htmlspecialchars($_POST['hoten'])));
  $id = trim(addslashes(htmlspecialchars($_POST['id_lopdk'])));
  $sdt = trim(addslashes(htmlspecialchars($_POST['sdt'])));
  $email = trim(addslashes(htmlspecialchars($_POST['email'])));
  $diachi = trim(addslashes(htmlspecialchars($_POST['diachi'])));
  $handk = trim(addslashes(htmlspecialchars($_POST['handk'])));
  $ngay_dk = trim(addslashes(htmlspecialchars($_POST['ngay_dk'])));
  $id_lopdk = trim(addslashes(htmlspecialchars($_POST['id_lopdk'])));
  $ma_lop = trim(addslashes(htmlspecialchars($_POST['ma_lop'])));
  $hocphi = trim(addslashes(htmlspecialchars($_POST['hocphi'])));
  $thanhtoan = trim(addslashes(htmlspecialchars($_POST['thanhtoan'])));
  $query = "
      INSERT INTO khach_hang_dang_ky(HoTen,Sdt,Email,DiaChi,HanDangKy,NgayDangKy,ThanhToan,id_lopdk,ma_lop,hoc_phi) 
      VALUES('$ten','$sdt','$email','$diachi','$handk','$ngay_dk','$thanhtoan','$id_lopdk','$ma_lop','$hocphi')";
  $query_run = $db->query($query);
  $query1 = "update mon_hoc set da_dk=da_dk+1 where id='$id'";

  $query_run1 = $db->query($query1);
  if (!$query_run && !$query_run1) {
    $_SESSION['success'] = "Thêm Thành Công";
    new Redirect($_DOMAIN . 'quanlykhoahoc');
  } else {
    $_SESSION['status'] = "Thêm Thất Bại";
    new Redirect($_DOMAIN . 'quanlykhoahoc');
  }
}
if (isset($_POST['update_btn'])) {
  $id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
  $edit_hoten = trim(addslashes(htmlspecialchars($_POST['edit_hoten'])));
  $edit_lophoc = trim(addslashes(htmlspecialchars($_POST['edit_lophoc'])));
  $edit_sdt = trim(addslashes(htmlspecialchars($_POST['edit_sdt'])));
  $edit_email = trim(addslashes(htmlspecialchars($_POST['edit_email'])));
  $edit_diachi =  trim(addslashes(htmlspecialchars($_POST['edit_diachi'])));
  $edit_thanhtoan = trim(addslashes(htmlspecialchars($_POST['edit_thanhtoan'])));
  $query = "
    UPDATE khach_hang_dang_ky 
    SET HoTen ='$edit_hoten',
		ma_lop='$edit_lophoc',
        Sdt ='$edit_sdt', 
        Email='$edit_email', 
        DiaChi='$edit_diachi', 
		ThanhToan='$edit_thanhtoan'
    WHERE id ='$id'";
  $query_run = $db->query($query);
  if (!$query_run) {
    $_SESSION['success'] = "Sửa Thành Công";
    new Redirect($_DOMAIN . 'quanlykhoahoc');
  } else {

    $_SESSION['status'] = "Sửa Thất Bại";
    new Redirect($_DOMAIN . 'quanlykhoahoc');
  }
}
if (isset($_POST['delete_btn'])) {
  $id_lopdk = trim(addslashes(htmlspecialchars($_POST['id_lopdk'])));

  $query = "update mon_hoc set da_dk=da_dk-1 where id='$id_lopdk'";
  $query_run = $db->query($query);
  if ($query_run) {
    new Redirect($_DOMAIN . 'quanlykhoahoc');
  }
}
if (isset($_POST['delete_btn'])) {
  $id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
  $id_lopdk = trim(addslashes(htmlspecialchars($_POST['id_lopdk'])));
  $query = "DELETE FROM khach_hang_dang_ky WHERE  id ='$id' ";
  $query_run = $db->query($query);
  if (!$query_run) {
    $_SESSION['success'] = "Xóa Thành Công";
    new Redirect($_DOMAIN . 'quanlykhoahoc');
  } else {
    $_SESSION['status'] = "Xóa Thất Bại";
    new Redirect($_DOMAIN . 'quanlykhoahoc');
  }
}
