<?php
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\User;

class UsersController extends Controller
{
    public function actionIndex()
    {
        $users = User::find()->orderBy(['name' => SORT_ASC])->asArray()->all();
        return $this->render('index', [
          'users' => $users
        ]);
    }
}