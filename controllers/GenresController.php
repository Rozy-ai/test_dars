<?php

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Users;

class GenresController extends ActiveController
{
    public $modelClass = 'app\models\Genres';

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
}