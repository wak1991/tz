<?php 

namespace application\controllers;
use application\core\Controller;

class MainController extends Controller
{
	public function indexAction()
	{
        $vars = [
            'task' => $this->model->getTask($this->route),
        ];
        $this->view->render('Список задач', $vars);
	}

    public function addAction()
    {
        if(!empty($_POST)){
            if (!$this->model->taskValidate($_POST, 'add')){
                $this->view->message('error', $this->model->error);
            }
            $id = $this->model->taskAdd($_POST);
            if (!$id){
                $this->view->message('error', 'Ошибка обработки запроса');
            }
            $this->view->message('success', 'Задача добавлена');
        }
        $this->view->render('Добавить задачу');
    }

    public function editAction()
    {
        if(!empty($_POST)){
            if (!$this->model->postValidate($_POST, 'edit')){
                $this->view->message('error', $this->model->error);
            }
            $this->view->message('success', 'OK');
        }
        $this->view->render('Редактировать задачу');
    }

}