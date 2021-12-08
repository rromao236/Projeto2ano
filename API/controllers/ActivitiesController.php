<?php

namespace app\modules\api\controllers;

use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\web\Controller;
use app\models\Activities;

/**
 * Default controller for the `api` module
 */
class ActivitiesController extends \yii\rest\ActiveController
{

    public $modelClass = 'app\models\Activities';

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    //Exemplo
    public function actionActivitie(){
        $name= Yii::$app->request->post('name');
        $ativmodel = new $this->modelClass;
        $ativmodel->name=$name;
        $ret = $ativmodel->save();
        return [
            'SaveError' => $ret,
        ];
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => function ($username, $password)
            {
                $user = \common\models\User::findByUsername($username);
                if ($user && $user->validatePassword($password))
                {
                    return $user;
                }
            }
        ];
        return $behaviors;
    }
}
