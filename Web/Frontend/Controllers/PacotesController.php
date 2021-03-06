<?php

namespace frontend\controllers;

use app\models\Activities;
use app\models\ActivitiesPackages;
use app\models\Airports;
use app\models\Hotels;
use app\models\Usersinfo;
use app\models\Userspackages;
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
use yii\web\NotFoundHttpException;

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

    public function actionCompra($id_pacote)
    {
        {
            if (Yii::$app->user->isGuest) {
                return $this->redirect(['site/login']);
            }
        }

        $session = Yii::$app->session;
        $session->open();
        $pac=$session['pac'];

        if($pac==null){
            $session['pac'] = $id_pacote;
        }


        $model = new Userspackages();

        $pacote = Packages::find()
            ->where(['id' => $id_pacote])
            ->one();

        $user = Usersinfo::find()
            ->where(['userid' => Yii::$app->user->identity->id])
            ->one();

        if ($this->request->isPost) {

            $model->load($this->request->post());

            $pacoteinfo= Packages::find()
                ->where(['id' => $pac])
                ->one();

            $userinfo = Usersinfo::find()
                ->where(['userid' => Yii::$app->user->identity->id])
                ->one();

            $pontospossuidos=$userinfo->points;
            $preco=$pacoteinfo->price;
            $pessoas=$model->nrpeople;
            $pontos=$model->usedpoints;

            if($pontos>$pontospossuidos || $pessoas==0){
                Yii::$app->session->setFlash('success', 'Quantidade de pontos ou numero de pessoas invalido!');
                //return $this->redirect(['index']);
            } else{

                $precofinal=$preco*$pessoas;
                $desconto=$precofinal*($pontos/100);
                $precofinal=$precofinal-$desconto;

                $model->id_user=$userinfo->userid;
                $model->id_package=$pacoteinfo->id;
                $model->purchasedate=date('Y-m-d H:i:s');
                $model->referencia=rand(900000000,999999999);

                $refer = (string)$model->referencia;
                $referFormat = substr($refer, 0, 3) .' '. substr($refer, 3, 3) .' '. substr($refer, 6);

                $model->price=$precofinal;
                $model->entity=11236;
                $model->estado="Por pagar";
                $model->save();


                return $this->render('view', [
                    'model' => $model,
                    'pacote' => $pacote,
                    'referFormat' => $referFormat,
                ]);
            }


        }


        return $this->render('create', [
            'pacote' => $pacote,
            'user' => $user,
            'model' => $model,
        ]);
    }

    public function actionCancelar($id)
    {
        $this->findModel($id)->delete();

        $pacotes = Packages::find()
            ->all();

        return $this->render('index', [
            'pacotes' => $pacotes,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Userspackages::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPontos($pontos){

        $model = Usersinfo::find()
            ->where(['userid' => Yii::$app->user->identity->id])
            ->one();

        $pontosobtidos=$model->points;

        $model->points=$pontosobtidos-$pontos+1;
        $model->save();

        $pacotes = Packages::find()
            ->all();

        Yii::$app->session->setFlash('success', 'Thank you for your purchase.');
        return $this->render('index', [
            'pacotes' => $pacotes,
        ]);
    }
}
