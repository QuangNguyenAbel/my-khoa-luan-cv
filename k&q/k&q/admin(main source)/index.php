<?php
// Require database & thông tin chung
require_once 'core/init.php';
// Require header
require_once 'includes/header.php';
// Nếu đăng nhập
if ($user) {
	// Hiển thị sidebar
	require_once 'includes/sidebar.php';
	// Hiển thị sidebar
	require_once 'templates/content.php';
}
// Nếu không đăng nhập
else {
	// Hiển thị form đăng nhập
	require_once 'templates/login.php';
}
// Require footer
require_once 'includes/footer.php';
