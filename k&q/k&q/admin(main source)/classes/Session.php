<?php
// Lớp session
class Session {
	// Hàm bắt đầu session
	public function start()
	{
		session_start();
	}
	// Hàm lưu session 
	public function send($user)
	{
		$_SESSION['user'] = $user;
	}
	// Hàm lấy dữ liệu session
	public function get() 
	{
		if (isset($_SESSION['user']))
		{
			$user = $_SESSION['user'];
		}
		else
		{
			$user = '';
		}
		return $user;
	}
	// Hàm xoá session
	public function destroy() 
	{
		session_destroy();
	}
}
// Lớp session
class dangky {
	// Hàm bắt đầu session
	public function start()
	{
		session_start();
	}
	// Hàm lưu session 
	public function send($hocvien)
	{
		$_SESSION['hocvien'] = $hocvien;
	}
	// Hàm lấy dữ liệu session
	public function get() 
	{
		if (isset($_SESSION['user']))
		{
			$hocvien = $_SESSION['user'];
		}
		else
		{
			$hocvien = '';
		}
		return $hocvien;
	}
	// Hàm xoá session
	public function destroy() 
	{
		session_destroy();
	}
}
