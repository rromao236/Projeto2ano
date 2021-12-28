<?php

namespace app\modules\api\controllers;

use app\models\Hotels;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\web\Controller;

/**
 * Default controller for the `api` module
 */
class HotelsController extends \yii\rest\ActiveController
{

    public $modelClass = 'app\models\Hotels';

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    //get hotel
    public function actionInformation($id){
        $hotel = Hotels::find()
            ->where(['id' => $id])
            ->one();

        return $hotel;
    }

    //delete hotel
    public function actionApagar($id){
        $climodel = new $this->modelClass;
        $ret=$climodel->deleteAll("id=".$id);
        if($ret)
            return ['DelError' => $ret];
        throw new \yii\web\NotFoundHttpException("Client id not found!");
    }

    //count hotels
    public function actionTotal(){
        $climodel = new $this->modelClass;
        $recs = $climodel::find()->all();
        return ['total' => count($recs)];
    }

    //update hotel
    public function actionUpdate($id){
        $name =\Yii::$app->request->post('name');
        $adress =\Yii::$app->request->post('adress');
        $city =\Yii::$app->request->post('city');
        $country =\Yii::$app->request->post('country');
        $description =\Yii::$app->request->post('description');
        $nightprice =\Yii::$app->request->post('nightprice');
        $rating =\Yii::$app->request->post('rating');

        $hotel = Hotels::find()->where("id = ".$id)->one();
        if($hotel != null){
            $hotel->name = $name;
            $hotel->adress = $adress;
            $hotel->city = $city;
            $hotel->country = $country;
            $hotel->description = $description;
            $hotel->nightprice = $nightprice;
            $hotel->rating = $rating;
            $hotel->save();

            return (['success' => true]);
        }
        return (['success' => false]);
    }

    //post hotel
    public function actionHotel(){
        $name= Yii::$app->request->post('name');
        $adress= Yii::$app->request->post('adress');
        $city= Yii::$app->request->post('city');
        $country= Yii::$app->request->post('country');
        $description= Yii::$app->request->post('description');
        $nightprice= Yii::$app->request->post('nightprice');
        $rating= Yii::$app->request->post('rating');
        $ativmodel = new $this->modelClass;
        $ativmodel->name = $name;
        $ativmodel->adress = $adress;
        $ativmodel->city = $city;
        $ativmodel->country = $country;
        $ativmodel->description = $description;
        $ativmodel->nightprice = $nightprice;
        $ativmodel->rating = $rating;
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
