<?php

namespace frontend\controllers;

use app\models\Usersinfo;
use app\models\UsersinfoSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsersinfoController implements the CRUD actions for Usersinfo model.
 */
class UsersinfoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Usersinfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $utilizador = UsersInfo::find()
            ->where(['userid'=> Yii::$app->user->identity->id])
            ->one();


        return $this->render('index', [
            'utilizador' => $utilizador,
        ]);
    }

    /**
     * Displays a single Usersinfo model.
     * @param int $userid Userid
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($userid)
    {
        return $this->render('view', [
            'model' => $this->findModel($userid),
        ]);
    }

    /**
     * Creates a new Usersinfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usersinfo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'userid' => $model->userid]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Usersinfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $userid Userid
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($userid)
    {
        $model = $this->findModel($userid);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index', 'userid' => $model->userid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Usersinfo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $userid Userid
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($userid)
    {
        $this->findModel($userid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usersinfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $userid Userid
     * @return Usersinfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($userid)
    {
        if (($model = Usersinfo::findOne($userid)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
