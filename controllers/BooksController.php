<?php

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Books;
use app\models\Users;
use Yii;

class BooksController extends ActiveController
{
public $modelClass = 'app\models\Books';

// public function actions()
// {
//     $actions = parent::actions();

//     unset($actions['create']);

//     return $actions;
// }


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

    // public function actionCreate()
    // {
    //  $model = new Books();
     
    //  $params = Yii::$app->request->post();
    //     $model->name = $params['name'];
    //     $model->author_id = $params['author_id'];
    //     $model->genre = $params['genre'];

    //    if (Yii::$app->request->isPost){
    //     return $model;die;
    //         if ($model->save())
    //         $model->link('genres', $genre);
    //         return [
    //             // 'response' => $response,
    //             'model' => $model
    //         ];
    //     }

    //     return 
    //          $model->getErrors();
        
    // }


    public function actionAuthor($id)
    {
        $book = Books::find()->where(['id' => $id])->one();
        return $book->author;
    }

}


