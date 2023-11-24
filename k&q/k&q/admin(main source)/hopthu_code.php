<?php
require_once 'core/init.php';
if (isset($_POST['delete_btn'])) {
	$id = trim(addslashes(htmlspecialchars($_POST['delete_id'])));
	$sql = "DELETE FROM phan_hoi WHERE  id ='$id'";
	$query_run = $db->query($sql);
	if (!$query_run) {
		$_SESSION['success'] = "Xóa Thành Công";
		new Redirect($_DOMAIN . 'hopthu');
	} else {
		$_SESSION['status'] = "Xóa Thất Bại";
		new Redirect($_DOMAIN . 'hopthu');
	}
}
