<?php 

namespace application\controllers;
use application\core\Controller;

class MainController extends Controller
{
	public function indexAction()
	{
        $vars = [
            'task' => $this->model->getTask($this->route),
            'comments' => $this->model->getComments($this->route),
        ];
        $this->view->render('Список задач', $vars);
	}

}