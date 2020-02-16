<?php
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Task;

class TasksController extends Controller
{
    public function actionIndex()
    {
        $tasks = Task::find(['status' => 'STATUS_NEW'])->orderBy(['date_create' => SORT_ASC])->asArray()->all();
        return $this->render('index', [
          'tasks' => $tasks
        ]);
    }
}