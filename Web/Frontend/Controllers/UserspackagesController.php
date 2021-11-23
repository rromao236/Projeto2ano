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

        foreach ($pacotesC AS $pacoteC){
            $pacotes = Packages::find()
                ->where(['id'=> $pacoteC->id_package])
                ->all();
        }



        return $this->render('index', [
            'pacotes' => $pacotes,
            'pacotesC' => $pacotesC,
        ]);
    }

}
