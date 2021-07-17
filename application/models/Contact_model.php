<?php


class Contact_model extends CI_Model {


    public function contact($data)
    {
        if (empty($data['fullname'])) {
            return ['status' => 0, 'field' => 'fullname', 'info' => 'Please fill in your fullname'];
        }elseif(empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return ['status' => 0, 'field' => 'email', 'info' => 'Invalid email.'];
        }elseif (empty($data['message'])) {
            return ['status' => 0, 'field' => 'message', 'info' => 'Please fill in your message'];
        }

        $result = $this->db->query("INSERT INTO contact (email, fullname, message) VALUES(".$this->db->escape($data['email']).",". $this->db->escape($data['fullname']). ",". $this->db->escape($data['message']). ")", $data);
        return $result === true ? ['status' => 1, 'info' => 'Thanks for contacting us. We will get back to you shortly.', 'redirect' => base_url()] : ['status' => 0, 'info' => 'An error occurred. Try again.'];
    }

}