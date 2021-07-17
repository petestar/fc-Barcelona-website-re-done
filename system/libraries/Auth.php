<?php


class CI_Auth {


	public static function allow($allow = true){
		$keys = ['status', 'id', 'email', 'role', 'username'];
		if ($allow) {
			foreach($keys as $key) {
				if (!isset($_SESSION[$key]) || empty($_SESSION[$key])) {
					header("Location: ". base_url().'login');
				}
			}
		}

	}

	public static function guest() {
		if (isset($_SESSION['status'])) {
			if ($_SESSION['status'] === true) {
				header("Location:". base_url());
			}
		}
	}

	public static function admin() {
		self::allow();
		if (isset($_SESSION['role'])) {
			if ($_SESSION['role'] !== 'admin') {
				header("Location:". base_url());
			}
		}
	}

}



