<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{
	
	public function getTask()
	{
		$result = $this->db->row('SELECT name, status FROM task ORDER BY id DESC');
		return $result;
	}

    public function taskValidate($post)
    {
        $nameLen = iconv_strlen($post['name']);
        if ($nameLen < 3 or $nameLen > 100){
            $this->error = 'Название должно содержать от 3 до 100 символов';
            return false;
        }
        return true;
    }

    public function taskAdd($post)
    {
        $params = [
            'id' => '',
            'name' => $post['name'],
            'status' => $post['status'],
        ];
        $this->db->query('INSERT INTO task VALUES (:id, :name, :status)', $params);
        return $this->db->lastInsertId();
    }
}