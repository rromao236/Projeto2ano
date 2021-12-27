<?php

namespace app\modules\api\controllers;

use app\models\Activitiespackages;
use Yii;
use yii\filters\auth\QueryParamAuth;
use yii\web\Controller;
use app\models\Activities;

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

    /*Exemplo
    public function actionActivitie(){
        $name= Yii::$app->request->post('name');
        $ativmodel = new $this->modelClass;
        $ativmodel->name=$name;
        $ret = $ativmodel->save();
        return [
            'SaveError' => $ret,
        ];
    }
    */


    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),

        ];
        return $behaviors;
    }

}
