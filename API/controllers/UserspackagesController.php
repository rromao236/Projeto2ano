<?php

namespace app\modules\api\controllers;

use app\models\Userspackages;
use yii\filters\auth\HttpBasicAuth;
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

    public function actionCompra(){
        $iduser=\Yii::$app->request->post('iduser');
        $idpackage=\Yii::$app->request->post('idpackage');
        $purchasedate=\Yii::$app->request->post('purchasedate');
        $referencia=\Yii::$app->request->post('referencia');
        $price=\Yii::$app->request->post('price');
        $entity=\Yii::$app->request->post('entity');
        $estado=\Yii::$app->request->post('estado');
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
}