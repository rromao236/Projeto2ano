<?php

namespace frontend\controllers;

use app\models\UsersInfo;
use yii\base\BaseObject;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsersInfoController implements the CRUD actions for UsersInfo model.
 */
class UsersInfoController extends Controller
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
     * Lists all UsersInfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => UsersInfo::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'nif' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single UsersInfo model.
     * @param int $nif Nif
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($nif)
    {
        return $this->render('view', [
            'model' => $this->findModel($nif),
        ]);
    }

    /**
     * Creates a new UsersInfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UsersInfo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'nif' => $model->nif]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UsersInfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $nif Nif
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($nif)
    {
        $model = $this->findModel($nif);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nif' => $model->nif]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UsersInfo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $nif Nif
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($nif)
    {
        $this->findModel($nif)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UsersInfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $nif Nif
     * @return UsersInfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nif)
    {
        if (($model = UsersInfo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionEditar(){
        $dataProvider = new ActiveDataProvider([
            'query' => UsersInfo::find(),
        ]);

        return $this->render('editar', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionHistorico(){
        $dataProvider = new ActiveDataProvider([
            'query' => UsersInfo::find(),
        ]);

        return $this->render('historico', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
