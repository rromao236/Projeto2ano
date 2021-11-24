<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PackageimagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Packageimages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="packageimages-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Packageimages', ['create', 'id' => $id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_image',
            //codigo da imagem
            //'image',
            [
                'label' => 'Imagem',
                'attribute' => 'image',
                'format' => 'html',
                'value' => function($model){
                    return yii\bootstrap\Html::img($model->image,['width'=>'156']);
                }
            ],
            'package_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
