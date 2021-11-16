<?php

namespace backend\controllers;

use app\models\Activitiespackages;
use app\models\ActivitiespackagesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActivitiespackagesController implements the CRUD actions for Activitiespackages model.
 */
class ActivitiespackagesController extends Controller
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
     * Lists all Activitiespackages models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new ActivitiespackagesSearch();
        $dataProvider = $searchModel->search(Activitiespackages::find()
            ->where(['id_package' => $id])
            ->all());
        //$dataProvider = Activitiespackages::find()
        //    ->where(['id_package' => $id])
        //    ->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
        ]);
    }

    /**
     * Displays a single Activitiespackages model.
     * @param int $id_activity Id Activity
     * @param int $id_package Id Package
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_activity, $id_package)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_activity, $id_package),
        ]);
    }

    /**
     * Creates a new Activitiespackages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Activitiespackages();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_activity' => $model->id_activity, 'id_package' => $model->id_package]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'id' => $id,
        ]);
    }

    /**
     * Updates an existing Activitiespackages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_activity Id Activity
     * @param int $id_package Id Package
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_activity, $id_package)
    {
        $model = $this->findModel($id_activity, $id_package);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_activity' => $model->id_activity, 'id_package' => $model->id_package]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Activitiespackages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_activity Id Activity
     * @param int $id_package Id Package
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_activity, $id_package)
    {
        $this->findModel($id_activity, $id_package)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Activitiespackages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_activity Id Activity
     * @param int $id_package Id Package
     * @return Activitiespackages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_activity, $id_package)
    {
        if (($model = Activitiespackages::findOne(['id_activity' => $id_activity, 'id_package' => $id_package])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
