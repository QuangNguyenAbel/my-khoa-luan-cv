<?php
require_once 'core/init.php';
if (isset($_POST['update_btn'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['edit_id'])));
	$edit_ghichu = trim(addslashes(htmlspecialchars($_POST['edit_ghichu'])));
	$sql = "UPDATE lich_hoc 
		SET 
			GhiChu='$edit_ghichu'
		WHERE id ='$id'";
	$query_run = mysqli_query($connection, $query);
	if ($db->query($sql)) {
		$_SESSION['status'] = "Ghi chú Thất Bại";
		new Redirect($_DOMAIN . 'lophoc_gv');
	} else {
		$_SESSION['success'] = "Ghi Chú Thành Công";
		new Redirect($_DOMAIN . 'lophoc_gv');
	}
}
