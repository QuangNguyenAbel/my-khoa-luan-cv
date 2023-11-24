<?php
// Require các thư viện PHP
require_once 'admin/classes/DB.php';
require_once 'admin/classes/Session.php';
require_once 'admin/classes/Functions.php';

// Kết nối database
$db = new DB();
$db->connect();
$db->set_char('utf8');

// Thông tin chung
$_DOMAIN = 'http://localhost:8080/k&q/';

date_default_timezone_set('Asia/Ho_Chi_Minh'); 
$date_current = '';
$date_current = date("Y-m-d H:i:sa");



?>