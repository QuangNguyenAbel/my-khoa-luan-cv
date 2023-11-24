<?php
require_once 'core/init.php';
if (isset($_POST['thanhtoan']) && isset($_POST['thanhtoan']) != "") {
  $id_hv = trim(addslashes(htmlspecialchars($_POST['id_hv'])));
  $username = trim(addslashes(htmlspecialchars($_POST['username'])));
  $user_code = trim(addslashes(htmlspecialchars($_POST['user_code'])));
  $id_nv = trim(addslashes(htmlspecialchars($_POST['id_nv'])));
  $ten_nv = trim(addslashes(htmlspecialchars($_POST['ten_nv'])));
  $ma_nv = trim(addslashes(htmlspecialchars($_POST['ma_nv'])));
  $ghi_chu = trim(addslashes(htmlspecialchars($_POST['ghichu'])));
  $id_lop = ($_POST['id_lop']);
  $count = count($_POST['id_lop']);
  $sotien = 0;
  $noidung = "Thu học phí học viên $username - Mã Học Viên: $user_code";
  # code...
  $thu_chi = 'Thu';
  $loai = 7;
  $id_nv = trim(addslashes(htmlspecialchars($_POST['id_nv'])));
  $ngay_thang = trim(addslashes(htmlspecialchars($_POST['ngay_thang'])));
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
  $ma_thu = $date . "_" . $id_hv;
  //thanh toán

  $giamgia = 0;
  $hoadon = "INSERT INTO 
  `hoa_don`(`MaThu`, `SoTien`, `NoiDung`, `nv_thu`, `ma_nv`, `id_hs`) 
  VALUES ('$ma_thu',0,'$noidung','$ten_nv','$ma_nv','$id_hv')";
  //chi tiết hoá đơn
  $id_hoadon = "(SELECT id_hd FROM `hoa_don` ORDER BY hoa_don.id_hd DESC LIMIT 1 )";
  if (!$db->query($hoadon)) {
    for ($i = 0; $i < $count; $i++) {
      $hocphi = "(SELECT mon_hoc.hocphi FROM chi_tiet_lop_hoc 
              JOIN lop_hoc On lop_hoc.id_lop=chi_tiet_lop_hoc.id_lop
              JOIN mon_hoc On mon_hoc.id_mon=lop_hoc.id_mh 
              WHERE chi_tiet_lop_hoc.id_hs='$id_hv' and chi_tiet_lop_hoc.id_lop='$id_lop[$i]')";
      $ct_hoadon = "INSERT INTO 
              `hoa_don_ct`(`id_lop_ct_hd`, `ct_hocphi`, `ct_giamgia`, `id_hoadon`) 
              VALUES($id_lop[$i],(SELECT mon_hoc.hocphi FROM chi_tiet_lop_hoc 
              JOIN lop_hoc On lop_hoc.id_lop=chi_tiet_lop_hoc.id_lop
              JOIN mon_hoc On mon_hoc.id_mon=lop_hoc.id_mh 
              WHERE chi_tiet_lop_hoc.id_hs='$id_hv' and chi_tiet_lop_hoc.id_lop='$id_lop[$i]'),$giamgia,$id_hoadon)";
      $thanhtoan = "UPDATE chi_tiet_lop_hoc 
              JOIN lop_hoc ON lop_hoc.id_lop=chi_tiet_lop_hoc.id_lop
              SET chi_tiet_lop_hoc.thanhtoan=1 
              WHERE chi_tiet_lop_hoc.id_hs='$id_hv' AND chi_tiet_lop_hoc.id_lop='$id_lop[$i]' and lop_hoc.trangthailop In(2,3)";
      !$db->query($ct_hoadon);
      !$db->query($thanhtoan);
    }
    $tien_thu="(SELECT SUM(hoa_don_ct.ct_hocphi) FROM `hoa_don_ct` WHERE hoa_don_ct.id_hoadon=$id_hoadon)";
    $tien_chi=0;
    $query = "INSERT INTO 
  `thu_chi`
  (`NgayThang`, `ThuChi`, `NoiDung`, `SoTienThu`, `SoTienChi`, `LuyKe`, `GhiChu`, `Nam`, `Thang`, `Quy`, `loai`, `id_nv`,`id_hd_thanhtoan`) 
  VALUES('$ngay_thang','$thu_chi','$noidung',$tien_thu,'$tien_chi',$tien_thu,'$ghi_chu','$year','$month','$quy','$loai','$id_nv',$id_hoadon)";
  $query_run = $db->query($query);
    $update = "UPDATE `hoa_don` 
    SET `SoTien`= (SELECT SUM(hoa_don_ct.ct_hocphi) FROM `hoa_don_ct` WHERE hoa_don_ct.id_hoadon=$id_hoadon) 
    WHERE hoa_don.id_hd=$id_hoadon";
    !$db->query($update);
    //history log
	$user = $data_user['username'];
	$usertype = $data_user['usertype'];
	$action = '6';
	$date = date("d-m-Y");
	$time = date("H:i:s");
	$data = 'Thanh toán cho học viên '.$username - 'Mã học Viên: '.$user_code;
	$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
  $db->query($history);
    $_SESSION['success'] = "Thanh Toán Thành Công ";
    new Redirect($_DOMAIN . 'thanhtoan_dshv');
  } else {
    $_SESSION['status'] = "Thanh Toán Thất Bại ";
    new Redirect($_DOMAIN . 'thanhtoan_dshv');
  }
}
