<?php
require_once 'core/init.php';
if (isset($_POST['add'])) {
	$gio_hoc = trim(addslashes(htmlspecialchars($_POST['gio_hoc'])));
	$phong_hoc = trim(addslashes(htmlspecialchars($_POST['phong_hoc'])));
	$ngay_khai_giang = trim(addslashes(htmlspecialchars($_POST['ngay_khai_giang'])));
	$ngay_ket_thuc = trim(addslashes(htmlspecialchars($_POST['ngay_ket_thuc'])));
	$id_lop = trim(addslashes(htmlspecialchars($_POST['id_lop'])));
	$query = "INSERT INTO 
	lich_hoc(Lop,GioHoc,GiaoVien,PhongHoc,NgayKhaiGiang,NgayKetThuc,id_lop,id_gv) 
	VALUES(
	(SELECT MaLop from lop_hoc WHERE id='$id_lop'),
	'$gio_hoc',
	(SELECT MaGV from lop_hoc WHERE id='$id_lop'),
	'$phong_hoc',
	'$ngay_khai_giang',
	'$ngay_ket_thuc',
	'$id_lop',
	(SELECT id_gv from lop_hoc WHERE id='$id_lop'))";
	$query1 = "UPDATE lop_hoc SET trangthailop=1 WHERE id='$id_lop'";
	$query_run = $db->query($query);
	$query1_run = $db->query($query1);
	if ($query_run && $query1_run) {
		$_SESSION['status'] = "Thêm Thất Bại";
		new Redirect($_DOMAIN . 'lichhoc');
	} else {

		$_SESSION['success'] = "Thêm Thành Công";
		new Redirect($_DOMAIN . 'lichhoc');
	}
}
if (isset($_POST['update_btn'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$edit_giohoc = trim(addslashes(htmlspecialchars($_POST['edit_giohoc'])));
	$edit_giangvien = trim(addslashes(htmlspecialchars($_POST['edit_giangvien'])));
	$edit_phonghoc = trim(addslashes(htmlspecialchars($_POST['edit_phonghoc'])));
	$edit_ngaykhaigiang = trim(addslashes(htmlspecialchars($_POST['edit_ngaykhaigiang'])));
	$edit_ngayketthuc = trim(addslashes(htmlspecialchars($_POST['edit_ngayketthuc'])));
	$edit_ghichu = trim(addslashes(htmlspecialchars($_POST['edit_ghichu'])));
	$query = "UPDATE lich_hoc 
		SET GioHoc='$edit_giohoc',
			GiaoVien='$edit_giangvien',
			PhongHoc='$edit_phonghoc',
			NgayKhaiGiang='$edit_ngaykhaigiang',
			NgayKetThuc='$edit_ngayketthuc',
			GhiChu='$edit_ghichu'
		WHERE id ='$id'";
	$query_run = $db->query($query);
	if (!$query_run) {
		$_SESSION['success'] = "Cập nhật thành công";
		new Redirect($_DOMAIN . 'lichhoc');
	} else {
		$_SESSION['status'] = "Cập nhật thất bại";
		new Redirect($_DOMAIN . 'lichhoc');
	}
}
if (isset($_POST['delete_btn'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
	$id_lop_xoa = trim(addslashes(htmlspecialchars($_POST['delete_id_lop'])));
	$query = "DELETE FROM lich_hoc WHERE  id ='$id'";
	$query1 = "UPDATE lop_hoc SET trangthailop=0 WHERE id='$id_lop_xoa'";
	$query_run = $db->query($query);
	$query1_run = $db->query($query1);
	if (!$query_run && !$query1_run) {
		$_SESSION['success'] = "Xóa thành công";
		new Redirect($_DOMAIN . 'lichhoc');
	} else {
		$_SESSION['status'] = "Xóa thất bại";
		new Redirect($_DOMAIN . 'lichhoc');
	}
}
