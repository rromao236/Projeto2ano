<?php

namespace app\modules\api\controllers;

use app\models\Airports;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\web\Controller;

/**
 * Default controller for the `api` module
 */
class AirportsController extends \yii\rest\ActiveController
{

    public $modelClass = 'app\models\Airports';

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    //get airport
    public function actionInformation($id){
        $airport = Airports::find()
            ->where(['id' => $id])
            ->one();

        return $airport;
    }

    //delete airport
    public function actionApagar($id){
        $climodel = new $this->modelClass;
        $ret=$climodel->deleteAll("id=".$id);
        if($ret)
            return ['DelError' => $ret];
        throw new \yii\web\NotFoundHttpException("Airport id not found!");
    }

    //count airports
    public function actionTotal(){
        $climodel = new $this->modelClass;
        $recs = $climodel::find()->all();
        return ['total' => count($recs)];
    }

    //update airport
    public function actionUpdate($id){
        $name =\Yii::$app->request->post('name');
        $country =\Yii::$app->request->post('country');
        $city =\Yii::$app->request->post('city');

        $airport = Airports::find()->where("id = ".$id)->one();
        if($airport != null){
            $airport->name = $name;
            $airport->country = $country;
            $airport->city = $city;
            $airport->save();

            return (['success' => true]);
        }
        return (['success' => false]);
    }

    //post airport
    public function actionAirport(){
        $name= Yii::$app->request->post('name');
        $country= Yii::$app->request->post('country');
        $city= Yii::$app->request->post('city');
        $ativmodel = new $this->modelClass;
        $ativmodel->name = $name;
        $ativmodel->country = $country;
        $ativmodel->city = $city;
        $ret = $ativmodel->save();
        return [
            'SaveError' => $ret,
        ];
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),

        ];
        return $behaviors;
    }

}
