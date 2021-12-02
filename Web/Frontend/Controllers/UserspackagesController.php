<?php

namespace frontend\controllers;

use app\models\Packages;
use app\models\Userspackages;
use Yii;

class UserspackagesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $pacotesC = Userspackages::find()
            ->where(['id_user'=> Yii::$app->user->identity->id])
            ->all();
        
        
        return $this->render('index', [
            'pacotesC' => $pacotesC,
        ]);
    }

}
