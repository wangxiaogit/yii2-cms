<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/6/30
 * Time: 16:10
 */

namespace backend\controllers;

use backend\actions\IndexAction;
use backend\models\search\UserSearch;
use yii\web\Controller;
class UserController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class'=>IndexAction::className(),
                'data' => function() {
                    $searchModel = \Yii::createObject( UserSearch::className() );
                    $dataProvider = $searchModel->search(\Yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ]
        ];
    }

    public function actionCreate()
    {
        return $this->render('create');
    }
}