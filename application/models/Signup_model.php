<?php


class Signup_model extends CI_Model {


	public function all()
    {
    	$query = $this->db->query("SELECT * FROM $this->table ORDER BY createdat DESC");
        return $query->result();
    }

    public function signup($data)
    {
        if(empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return ['status' => 0, 'field' => 'email', 'info' => 'Invalid email.'];
        }elseif($this->_ci->login_model->findByEmail($data['email'])) {
            return ['status' => 0, 'field' => 'email', 'info' => 'Email is already in use. Try another.'];
        }elseif (empty($data['username'])) {
            return ['status' => 0, 'field' => 'username', 'info' => 'Please fill in your username'];
        }elseif (empty($data['password'])) {
            return ['status' => 0, 'field' => 'password', 'info' => 'Please fill in your password'];
        }elseif($data['password'] !== $data['confirmpassword']) {
            return ['status' => 0, 'field' => 'confirmpassword', 'info' => 'Passwords do not match.'];
        }

        $data = array_merge($data, ['role' => 'user']);
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        unset($data['confirmpassword']);
        $result = $this->db->query("INSERT INTO login (email, username, password, role) VALUES(".$this->db->escape($data['email']).",". $this->db->escape($data['username']). ",". $this->db->escape($data['password']). ",". $this->db->escape($data['role']).")", $data);
        return $result === true ? ['status' => 1, 'info' => 'Signup successful', 'redirect' => base_url().'login'] : ['status' => 0, 'info' => 'An error occurred. Try again.'];
    }

}