<?php

namespace app\modules\api\controllers;

use yii\filters\auth\QueryParamAuth;
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

    //get package
    public function actionInformation($id){
        $package = Packages::find()
            ->where(['id' => $id])
            ->one();

        return $package;
    }

    //delete package
    public function actionApagar($id){
        $climodel = new $this->modelClass;
        $ret=$climodel->deleteAll("id=".$id);
        if($ret)
            return ['DelError' => $ret];
        throw new \yii\web\NotFoundHttpException("Client id not found!");
    }

    //count package
    public function actionTotal(){
        $climodel = new $this->modelClass;
        $recs = $climodel::find()->all();
        return ['total' => count($recs)];
    }

    //update package
    public function actionUpdate($id){
        $title =\Yii::$app->request->post('title');
        $description =\Yii::$app->request->post('description');
        $price =\Yii::$app->request->post('price');
        $rating =\Yii::$app->request->post('rating');
        $flightstart =\Yii::$app->request->post('flightstart');
        $flightend =\Yii::$app->request->post('flightend');
        $flightbackstart =\Yii::$app->request->post('flightbackstart');
        $flightbackend =\Yii::$app->request->post('flightbackend');
        $id_hotel =\Yii::$app->request->post('id_hotel');
        $id_airportstart =\Yii::$app->request->post('id_airportstart');
        $id_airportend =\Yii::$app->request->post('id_airportend');

        $package = Packages::find()->where("id = ".$id)->one();
        if($package != null){
            $package->title = $title;
            $package->description = $description;
            $package->price = $price;
            $package->rating = $rating;
            $package->flightstart = $flightstart;
            $package->flightend = $flightend;
            $package->flightbackstart = $flightbackstart;
            $package->flightbackend = $flightbackend;
            $package->id_hotel = $id_hotel;
            $package->id_airportstart = $id_airportstart;
            $package->id_airportend = $id_airportend;
            $package->save();

            return (['success' => true]);
        }
        return (['success' => false]);
    }


    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),

        ];
        return $behaviors;
    }

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
            //'atividades' => $atividades,
            //'imagens' => $imagens
        ];
    }

}
