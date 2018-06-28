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

    public function apiAction()
    {
        $vars = [
            'task' => $this->model->getApi($this->route),
        ];
        $this->view->render('Список задач Api', $vars);
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
        if (!$this->model->isTaskExists($this->route['id'])){
            $this->view->errorCode(404);
        }

        if(!empty($_POST)){
            if (!$this->model->taskValidate($_POST, 'edit')){
                $this->view->message('error', $this->model->error);
            }
            $this->model->taskEdit($_POST, $this->route['id']);
            $this->model->commentsAdd($_POST, $this->route['id']);
            $this->view->location('/edit/' . $this->route['id']);
            $this->view->message('success', 'Сохранено');

        }
        $vars = [
            'data' => $this->model->taskData($this->route['id'])[0],
            'data_comments' => $this->model->commentsData($this->route['id']),
        ];
        $this->view->render('Редактировать задачу', $vars);
    }

}