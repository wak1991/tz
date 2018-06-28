<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{
	
	public function getTask()
	{
		$result = $this->db->row('SELECT task.id, task.name, task.status,
                                        COUNT(comments.id) AS qty FROM task AS task LEFT JOIN comments AS comments ON task.id=comments.id_task
                                        GROUP BY task.id, task.name, task.status
                                        ORDER BY task.id DESC');
		return $result;
	}

    public function getApi()
    {
        $result = $this->db->row('SELECT name FROM task');
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

    public function taskEdit($post, $id)
    {
        $params = [
            'id' => $id,
            'name' => $post['name'],
            'status' => $post['status'],
        ];

        $this->db->query('UPDATE task SET name = :name, status = :status WHERE id = :id', $params);
    }

    public function isTaskExists($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->column('SELECT id FROM task WHERE id = :id', $params);
    }

    public function taskData($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->row('SELECT * FROM task WHERE id = :id', $params);
    }

    public function commentsData($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->row('SELECT * FROM comments WHERE id_task = :id ORDER BY id DESC', $params);
    }

    public function commentsAdd($post, $id)
    {
        $params = [
            'id' => '',
            'id_task' => $id,
            'text' => $post['comment'],
        ];
        if (!empty($post['comment'])){
            $this->db->query('INSERT INTO comments VALUES (:id, :id_task, :text)', $params);
        }
    }

}