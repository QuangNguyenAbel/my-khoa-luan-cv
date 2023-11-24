<?php
// Require database & thông tin chung
require_once 'core/init.php';
$user=$data_user['username'];
$usertype=$data_user['usertype'];
$action= '2';
$date= date("d-m-Y");
$time= date("H:i:s");
$data ='';
// Xoá session
$history = "INSERT INTO history(user,usertype,action,data,date,time) 
  VALUES('$user','$usertype','$action','$data','$date','$time')";
$query_run = $db->query($history);
$session->destroy();
new Redirect("http://localhost:8080/k&q/"); // Trở về trang index
