<?php
require_once 'core/init.php';
if (isset($_POST['add'])) {
	$ten = trim(addslashes(htmlspecialchars($_POST['ten'])));
	$email = trim(addslashes(htmlspecialchars($_POST['email'])));
	$matkhau = trim(addslashes(htmlspecialchars(md5($_POST['matkhau']))));
	$matkhau_nl = trim(addslashes(htmlspecialchars(md5($_POST['matkhau_nl']))));
	$ns = trim(addslashes(htmlspecialchars($_POST['ns'])));
	$sdt = trim(addslashes(htmlspecialchars($_POST['sdt'])));
	$diachi = trim(addslashes(htmlspecialchars($_POST['diachi'])));
	mt_srand(mktime(1));
	$ma = 'HV-' . (mt_rand());
	$sql1="SELECT * FROM register WHERE phone='$sdt' or email='$email'";
	$sql = "INSERT INTO `register`
	(`email`, `password`, `username`, `usertype`, `status`, `user_code`, `address`, `phone`,`birth`) 
	VALUES ('$email','$matkhau','$ten','6','0','$ma','$diachi','$sdt','$ns')";
	if ($matkhau == $matkhau_nl) {
		if($db->num_rows($sql1)>=1)
		{
			new Redirect($_DOMAIN . 'dangky_thatbai');
		}
		else
		{
			if(!$db->query($sql)){
				new Redirect($_DOMAIN . 'dangky_thanhcong');
			}			
		}
	}
	else
	{
		new Redirect($_DOMAIN . 'dangky_saimatkhau');
	}
}
