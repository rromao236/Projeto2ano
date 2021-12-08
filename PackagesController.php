<?php

namespace app\modules\api\controllers;

use yii\web\Controller;
use yii\filters\auth\HttpBasicAuth;
use app\models\Packages;
use app\models\Hotels;
use app\models\Airports;
use app\models\Activities;
use app\models\Activitiespackages;
use app\models\Packageimages;


/**
 * Default controller for the `api` module
 */
class PackagesController extends \yii\rest\ActiveController
{

    public $modelClass = 'app\models\Packages';

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

    /*
    public function actionDetalhes($id){
        $pacote = Packages::find()
            ->where(['id' => $id])
            ->one();
        $hotel = Hotels::find()
            ->where(['id' => $pacote->id_hotel])
            ->one();
        $aeroPartida = Airports::find()
            ->where(['id' => $pacote->id_airportstart])
            ->one();
        $aeroChegada = Airports::find()
            ->where(['id' => $pacote->id_airportend])
            ->one();

        $atividades[] = null;
        $activity = Activitiespackages::find()
            ->where(['id_package' => $pacote->id])
            ->all();
        foreach ($activity as $actv){
            $ativ = Activities::find()
                ->where(['id' => $actv->id_activity])
                ->one();

            $atividade = new \stdClass();
            $atividade->nome = $ativ->name;
            $atividade->responsavel = $actv->responsible;
            $atividade->data = $actv->timestart;
            $atividade->duracao = $actv->duration;

            $atividades[] = $atividade;
        }

        $imagens = Packageimages::find()
            ->where(['package_id' => $pacote->id])
            ->all();

        return[
            'pacote' => $pacote,
            'hotel' => $hotel,
            'aeroportoPartida' => $aeroPartida,
            'aeroportoChegada' => $aeroChegada,
            'atividades' => $atividades,
            'imagens' => $imagens
        ];

    }
    */
}
