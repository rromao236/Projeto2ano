<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use backend\models\Packages;

/**
 * Site controller
 */
class PacotesController extends Controller
{


    public function actionIndex()
    {
//        return $this->render('index');
        $pacotes = Packages::find()
            ->all();

        return $this->render('index', [
            'pacotes' => $pacotes,
        ]);

    }

    public function actionDetalhes()
    {
        return $this->render('detalhes');
    }

    public function actionCompra()
    {
        return $this->render('compra');
    }





}
