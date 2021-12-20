<?php

namespace app\modules\api\controllers;

use common\models\User;
use Yii;
use yii\web\Controller;
use common\models\LoginForm;


/**
 * Default controller for the `api` module
 */
class LoginController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\User';

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUser(){

        $username = Yii::$app->request->post('username');
        $password = Yii::$app->request->post('password');

        if($username != null && $password != null){

            $model = new LoginForm();
            $model->username = $username;
            $model->password = $password;

            if ($model->login()) {

                $user = User::find()
                    ->where(['username' => $username])
                    ->one();

                return (['success' => true, 'token' => $user->auth_key]);
            }

        }

        return(['mensagem' => 'Dados Inválidos']);

    }
}
