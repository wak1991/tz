<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{
	
	public function getTask()
	{
		$result = $this->db->row('SELECT name, status FROM task');
		return $result;
	}

    public function getComments($comments)
    {
        $result = $this->db->row('SELECT COUNT(*) FROM comments WHERE id_task = $comments');
        return $result;
    }
}