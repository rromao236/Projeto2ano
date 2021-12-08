<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserspackagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Userspackages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userspackages-index">

<!--    <h1>Html::encode($this->title)</h1>-->

    <p>
<!--        Html::a('Create Userspackages', ['create'], ['class' => 'btn btn-success'])-->
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'id_user',
            'id_package',
            'purchasedate',
            'referencia',
            'price',
            'entity',
            'estado',
//            'usedpoints',
//            'nrpeople',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
