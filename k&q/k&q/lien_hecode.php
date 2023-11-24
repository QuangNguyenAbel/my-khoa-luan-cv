<?php
require_once 'core/init.php';
if (isset($_POST['add_phanhoi'])) {

	$ho_ten = trim(addslashes(htmlspecialchars($_POST['ho_ten'])));
	$sdt = trim(addslashes(htmlspecialchars($_POST['sdt'])));
	$mail = trim(addslashes(htmlspecialchars($_POST['mail'])));
	$noidung = trim(addslashes(htmlspecialchars($_POST['noidung'])));
	$sql = "INSERT INTO phan_hoi(ho_ten,sdt,mail,noidung) VALUES('$ho_ten','$sdt','$mail','$noidung')";

	$query_run = $db->query($sql);
	if (!$query_run) {
		new Redirect($_DOMAIN . 'lienhe_success');
	}
}
