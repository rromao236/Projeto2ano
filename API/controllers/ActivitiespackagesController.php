<?php

namespace app\modules\api\controllers;

use yii\filters\auth\HttpBasicAuth;
use yii\web\Controller;

/**
 * Default controller for the `api` module
 */
class ActivitiespackagesController extends \yii\rest\ActiveController
{

    public $modelClass = 'app\models\Activitiespackages';

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
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
