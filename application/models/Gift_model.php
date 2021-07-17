<?php


class Gift_model extends CI_Model {


    public function upload($data)
    {

        $result = $this->db->query("INSERT INTO uploads (filename, userid, type) VALUES(".$this->db->escape($data['filename']).",". $this->db->escape($data['userid']).",". $this->db->escape($data['type']).")", $data);
        return $result === true ? ['status' => 1, 'info' => 'Jersey uploaded successfully'] : ['status' => 0, 'info' => 'An error occurred. Try again.'];
    }

}