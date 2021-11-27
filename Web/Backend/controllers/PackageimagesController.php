<?php

namespace backend\controllers;

use app\models\Packageimages;
use app\models\PackageimagesSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PackageimagesController implements the CRUD actions for Packageimages model.
 */
class PackageimagesController extends Controller
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
     * Lists all Packageimages models.
     * @return mixed
     */

    public function actionIndex($id)
    {

        $session = Yii::$app->session;
        unset($session['idpacote']);
        $session['idpacote'] = $id;

        $query = Packageimages::find();
        $query->where(['package_id' => $id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $searchModel = new PackageimagesSearch();
        //$dataProvider = $searchModel->search(Packageimages::find()
        //    ->where(['package_id' => $id])
        //    ->all());

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
        ]);
    }

    /**
     * Displays a single Packageimages model.
     * @param int $id_image Id Image
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Packageimages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Packageimages();

        if ($this->request->isPost) {

            //if ($model->load($this->request->post()) && $model->save()) {
            $model->load($this->request->post());

            //codigo para a imagem
            $model->image = UploadedFile::getInstance($model, 'image');
            $rand = rand(1, 4000);
            $image_name = $model->name.$rand.'.'.$model->image->extension;
            $image_path = 'images/pacotes/'.$image_name;
            $model->image->saveAs($image_path);
            $model->image = $image_path;

            $model->save();

            return $this->redirect(['view', 'id' => $model->id_image]);
           // }
        } else {
            $model->loadDefaultValues();
        }

        $session = Yii::$app->session;

        return $this->render('create', [
            'model' => $model,
            'id' => $session['idpacote'],
        ]);
    }

    /**
     * Updates an existing Packageimages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_image Id Image
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        //if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
        if ($this->request->isPost){

            $model->load($this->request->post());

            //codigo para a imagem
            $model->image = UploadedFile::getInstance($model, 'image');
            $rand = rand(1, 4000);
            $image_name = $model->name.$rand.'.'.$model->image->extension;
            $image_path = 'images/pacotes/'.$image_name;
            $model->image->saveAs($image_path);
            $model->image = $image_path;

            $model->save();

            return $this->redirect(['view', 'id' => $model->id_image]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Packageimages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_image Id Image
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $session = Yii::$app->session;

        $this->findModel($id)->delete();

        return $this->redirect(['index', 'id' => $session['idpacote']]);
    }

    /**
     * Finds the Packageimages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_image Id Image
     * @return Packageimages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Packageimages::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
