<?php

namespace app\modules\api\controllers;

use app\models\Packageimages;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\web\Controller;

/**
 * Default controller for the `api` module
 */
class PackageimagesController extends \yii\rest\ActiveController
{

    public $modelClass = 'app\models\Packageimages';

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    //get packageimage
    public function actionInformation($id){
        $packageimage = Packageimages::find()
            ->where(['id_image' => $id])
            ->one();

        return $packageimage;
    }

    //count packageimage
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
