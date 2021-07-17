<?php


class Login_model extends CI_Model {

	private $table = 'login';

	public function login($data)
    {
        if(empty($data['email'])) {
            return ['status' => 0, 'field' => 'email', 'info' => 'Please fill in your email.'];
        }elseif (empty($data['password'])) {
            return ['status' => 0, 'field' => 'password', 'info' => 'Please fill in your password'];
        }

        $query = $this->db->query("SELECT * FROM $this->table WHERE email = ? LIMIT 1", [$data['email']]);
        $user = $query->row();
        if (empty($user)) return ['status' => 0, 'info' => 'Invalid Login Details'];

        if (!password_verify($data['password'], $user->password)) return ['status' => 0, 'info' => 'Invalid Login Details'];
        $_SESSION['id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        $_SESSION['status'] = true;

        $role = $user->role;
        $_SESSION['role'] = $role;
        $redirect = $role === 'admin' ? base_url().'admin' : base_url();
        return ['status' => 1, 'info' => 'Login Successful', 'redirect' => $redirect];

    }

}