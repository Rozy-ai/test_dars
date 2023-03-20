<?php

namespace app\controllers;

use app\models\Authors;
use yii\rest\ActiveController;
use app\models\Users;


class AuthorsController extends ActiveController
{
    public $modelClass = 'app\models\Authors';

    public function behaviors()
    {
        return [
            'basicAuth' => [
                'class' => \yii\filters\auth\HttpBasicAuth::class,
                'auth' => function ($username, $password) {
                    $admin = Users::find()->where(['login' => $username])->one();
                    if ($admin && $admin->validatePassword($password) && $admin->getRoles() == 'ADMIN') {
                        return $admin;
                    }
                    return null;
                },
            ],
            'contentNegotiator' => [
                'class' => \yii\filters\ContentNegotiator::className(),
                'formatParam' => '_format',
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON
                ],
            ],
        ];
    }

    public function actionBooks($id)
    {
        $author = Authors::find()->where(['id' => $id])->one();
        return $author->books;
    }
}