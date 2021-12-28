<?php

namespace app\modules\api\controllers;

use app\models\Activitiespackages;
use Yii;
use yii\filters\auth\QueryParamAuth;
use yii\web\Controller;
use app\models\Activities;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `api` module
 */
class ActivitiesController extends \yii\rest\ActiveController
{

    public $modelClass = 'app\models\Activities';

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    //recebe o id do pacote para mandar as atividades do mesmo
    public function actionAll($id){
        $atividades[] = null;
        $activity = Activitiespackages::find()
            ->where(['id_package' => $id])
            ->all();
        foreach ($activity as $actv){
            $ativ = Activities::find()
                ->where(['id' => $actv->id_activity])
                ->one();

            $atividade = new \stdClass();
            $atividade->id = $actv->id;
            $atividade->name = $ativ->name;
            $atividade->idPackage = $actv->id_package;
            $atividade->responsible = $actv->responsible;
            $atividade->timestart = $actv->timestart;
            $atividade->duration = $actv->duration;

            $atividades[] = $atividade;
        }

        return $atividades;

    }

    //get activitie
    public function actionInformation($id){
        $activity = Activities::find()
            ->where(['id' => $id])
            ->one();

        return $activity;
    }

    //delete activitie
    public function actionApagar($id){
        $climodel = new $this->modelClass;
        $ret=$climodel->deleteAll("id=".$id);
        if($ret)
            return ['DelError' => $ret];
        throw new \yii\web\NotFoundHttpException("Client id not found!");
    }

    //count activities
    public function actionTotal(){
        $climodel = new $this->modelClass;
        $recs = $climodel::find()->all();
        return ['total' => count($recs)];
    }

    //update activitie
    public function actionUpdate($id){
        $name =\Yii::$app->request->post('name');


        $activity = Activities::find()->where("id = ".$id)->one();
        if($activity != null){
            $activity->name = $name;
            $activity->save();

            return (['success' => true]);
        }
        return (['success' => false]);
    }

    //post activitie
    public function actionActivitie(){
        $name= Yii::$app->request->post('name');
        $ativmodel = new $this->modelClass;
        $ativmodel->name=$name;
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
