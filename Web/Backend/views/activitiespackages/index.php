<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActivitiespackagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activitiespackages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activitiespackages-index">



    <p><br>
        <?= Html::a('Create Activitiespackages', ['create', 'id' => $id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_activity',
            'id_package',
            'responsible',
            'timestart',
            'duration',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
