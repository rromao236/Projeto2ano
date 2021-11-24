<?php

namespace frontend\controllers;

use app\models\Activities;
use app\models\ActivitiesPackages;
use app\models\Airports;
use app\models\Hotels;
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
use app\models\Packages;

/**
 * Site controller
 */
class PacotesController extends Controller
{

    public function actionIndex()
    {
        $pacotes = Packages::find()
            ->all();

        return $this->render('index', [
            'pacotes' => $pacotes,
        ]);
    }

    public function actionDetalhes($pacote)
    {
        $atividades_array = array();

        $pacote_detalhe = Packages::find()
            ->where(['id'=> $pacote])
            ->one();

        $atividades_pacotes = ActivitiesPackages::find()
            ->where(['id_package' => $pacote_detalhe->id])
            ->all();

        $hotel = Hotels::find()
            ->where(['id' => $pacote_detalhe->id_hotel])
            ->one();

        $aeroporto_start = Airports::find()
            ->where(['id' => $pacote_detalhe->id_airportstart])
            ->one();

        $aeroporto_end = Airports::find()
            ->where(['id' => $pacote_detalhe->id_airportend])
            ->one();


        return $this->render('detalhes', [
            'pacote_detalhe' => $pacote_detalhe,
            'atividades_pacotes' => $atividades_pacotes,
            'aeroporto_start' => $aeroporto_start,
            'aeroporto_end' => $aeroporto_end,
            'hotel' => $hotel,
        ]);
    }

    public function actionCompra()
    {
        return $this->render('compra');
    }
}
