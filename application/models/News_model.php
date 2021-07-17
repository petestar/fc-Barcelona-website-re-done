<?php


class News_model extends CI_Model {

	private $table = 'news';

	public function all()
    {
    	$query = $this->db->query("SELECT * FROM $this->table ORDER BY createdat DESC");
        return $query->result();
    }

    public function add($data)
    {
        if(empty($data['title'])) {
            return ['status' => 0, 'field' => 'title', 'info' => 'Please fill in your title.'];
        }elseif (empty($data['author'])) {
            return ['status' => 0, 'field' => 'author', 'info' => 'Please fill in your author'];
        }elseif (empty($data['description'])) {
            return ['status' => 0, 'field' => 'description', 'info' => 'Please fill in your description'];
        }

        $result = $this->db->query("INSERT INTO $this->table (title, author, description) VALUES(".$this->db->escape($data['title']).",". $this->db->escape($data['author']). ",". $this->db->escape($data['description']).")", $data);
        return $result === true ? ['status' => 1, 'info' => 'News added successfully'] : ['status' => 0, 'info' => 'An error occurred. Try again.'];
    }

    public function update()
    {
        $this->title    = $_POST['title'];
        $this->description  = $_POST['description'];
        $this->date     = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

    public function upload($data)
    {

        $this->db->where('id', $data['id']);
        $result = $this->db->update($this->table, $data);
        return $result === true ? ['status' => 1, 'info' => 'News image uploaded successfully'] : ['status' => 0, 'info' => 'An error occurred. Try again.'];
    }

    public function find($id)
    {
        $query = $this->db->query("SELECT * FROM $this->table WHERE id = ? LIMIT 1", [$id]);
        return $query->row();
    }

    public function delete($id)
    {
        $news = $this->find($id);
        $filename = IMAGES_PATH.'/news/'.$news->image;
        if(file_exists($filename)) unlink($filename);
        $result = $this->db->query("DELETE FROM $this->table WHERE id = ? LIMIT 1", [$id]);
        return $result === true ? ['status' => 1, 'info' => 'News deleted successfully'] : ['status' => 0, 'info' => 'An error occurred. Try again.'];
    }

    public function edit($data)
    {
        if(empty($data['title'])) {
            return ['status' => 0, 'field' => 'title', 'info' => 'Please fill in your title.'];
        }elseif (empty($data['author'])) {
            return ['status' => 0, 'field' => 'author', 'info' => 'Please fill in your author'];
        }elseif (empty($data['description'])) {
            return ['status' => 0, 'field' => 'description', 'info' => 'Please fill in your description'];
        }

        $this->db->where('id', $data['id']);
        unset($data['id']);
        $result = $this->db->update($this->table, $data);
        return $result === true ? ['status' => 1, 'info' => 'News updated successfully'] : ['status' => 0, 'info' => 'An error occurred. Try again.'];
    }

}