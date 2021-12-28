<?php

namespace app\modules\api\controllers;

use app\models\Userspackages;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\web\Controller;

/**
 * Default controller for the `api` module
 */
class UserspackagesController extends \yii\rest\ActiveController
{

    public $modelClass = 'app\models\Userspackages';

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionHistorico($id){
        $historico = Userspackages::find()
            ->where(['id_user' => $id])
            ->all();

        return $historico;
    }

    public function actionCompra(){
        $iduser=\Yii::$app->request->post('iduser');
        $idpackage=\Yii::$app->request->post('idpackage');
        $purchasedate=\Yii::$app->request->post('purchasedate');//por nos
        $referencia=\Yii::$app->request->post('referencia');//por nos
        $price=\Yii::$app->request->post('price');
        $entity=\Yii::$app->request->post('entity');//por nos
        $estado=\Yii::$app->request->post('estado');//por nos
        $usedpoints=\Yii::$app->request->post('usedpoints');
        $nrpeople=\Yii::$app->request->post('nrpeople');

        $compra = new Userspackages();
        $compra->id_user = $iduser;
        $compra->id_package = $idpackage;
        $compra->purchasedate = $purchasedate;
        $compra->referencia = $referencia;
        $compra->price = $price;
        $compra->entity = $entity;
        $compra->estado = $estado;
        $compra->usedpoints = $usedpoints;
        $compra->nrpeople = $nrpeople;
        $ret = $compra->save();

        return ['SaveError' => $ret];
    }

    //count userspackages
    public function actionTotal(){
        $climodel = new $this->modelClass;
        $recs = $climodel::find()->all();
        return ['total' => count($recs)];
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
