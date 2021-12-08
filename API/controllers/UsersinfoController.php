<?php

namespace app\modules\api\controllers;

use app\models\Usersinfo;
use yii\filters\auth\HttpBasicAuth;
use yii\web\Controller;

/**
 * Default controller for the `api` module
 */
class UsersinfoController extends \yii\rest\ActiveController
{

    public $modelClass = 'app\models\Usersinfo';

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpdate($id){
        $nif =\Yii::$app->request->post('nif');
        $name =\Yii::$app->request->post('name');
        $adress =\Yii::$app->request->post('adress');
        $phone =\Yii::$app->request->post('phone');
        $birthdate =\Yii::$app->request->post('birthdate');

        $user = Usersinfo::find()->where("userid = ".$id)->one();
        if($user != null){
            $user->nif = $nif;
            $user->name = $name;
            $user->adress = $adress;
            $user->phone = $phone;
            $user->birthdate = $birthdate;

        }
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
