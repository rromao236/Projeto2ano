<?php

namespace app\modules\api\controllers;

use app\models\Usersinfo;
use common\models\User;
use yii\web\Controller;

/**
 * Default controller for the `api` module
 */
class RegistarController extends \yii\rest\ActiveController
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

        $username = \Yii::$app->request->post('username');
        $email = \Yii::$app->request->post('email');
        $password = \Yii::$app->request->post('password');

        if ($username != null && $email != null && $password != null) {

            $user = new User();
            $user->username = $username;
            $user->email = $email;
            $user->setPassword($password);
            $user->generateAuthKey();
            $user->generateEmailVerificationToken();
            $user->save(false);

            $auth = \Yii::$app->authManager;
            $userRole = $auth->getRole('user');
            $auth->assign($userRole, $user->getId());

            $user_info = new UsersInfo();
            $user_info->userid = $user->getId();
            $user_info->save(false);

            return ([$user, 'success' => true]);
        }
        return (['erro' => 'Dados Inválidos']);
    }
}
