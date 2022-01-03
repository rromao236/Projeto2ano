<?php

use app\models\Packageimages;
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'RAR Travels';
?>
<div class="site-index">

    <style>
        .button {
            border: none;
            color: white;
            /*padding: 15px 32px;*/
            padding: 5px 2px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            width: 200px;
        }

        .button1 {
            background-color: white;
            color: black;
            border: 2px solid #dbf3fa;
            width: 100px;
            align: right;
        }

        .button1:hover {
            background-color: #dbf3fa;
            color: black;

        }

        .row{
            border: 5px solid #ffffff;
            margin-left: 100px;
            margin-right: 50px;
            background-color: white;
            text-align: left;
        }

        #detalhes{
            font-size: 19px;
        }
        .btn-primary{
            width: 200px;
        }

    </style>

    <div class="body-content">
        <?php foreach ($pacotes as $pacote){
            $imagem = Packageimages::find()
            ->where(['package_id' => $pacote->id])
            ->one();
            ?>
            <div class="row">
                <div class="col-lg-12" style="text-align: center;">
<!--                    <img width="420px" height="auto" align="left" style="" src="--><?//= yii\helpers\Url::to('@web/imgs/pacotePrincipal.png') ?><!--">-->
                    <img width="420px" height="auto" align="left" style="" src="<?php echo Yii ::getAlias('@imageurl'); ?>/<?= $imagem->image?>">
                    <div style="text-align:left;">
                        <h3 style="text-align: left; margin-left: 540px;"><?php echo $pacote->title; ?></h3>
                        <p align="left" style="margin-left: 540px;"><?php echo $pacote->description; ?></p>
                        <p id="detalhes" align="left" style="margin-left: 540px;">Rating: <?php switch($pacote->rating){
                                case 0:
                                    echo "&#9734&#9734&#9734&#9734&#9734";
                                    break;
                                case 1:
                                    echo "&#9733&#9734&#9734&#9734&#9734";
                                    break;
                                case 2:
                                    echo "&#9733&#9733&#9734&#9734&#9734";
                                    break;
                                case 3:
                                    echo "&#9733&#9733&#9733&#9734&#9734";
                                    break;
                                case 4:
                                    echo "&#9733&#9733&#9733&#9733&#9734";
                                    break;
                                case 5:
                                    echo "&#9733&#9733&#9733&#9733&#9733";
                                    break;
                            } ?></p>
                        <p id="detalhes" style="margin-left: 540px; size=;">Preço: <?php echo $pacote->price; ?>€ <?= Html::a('Detalhes', ['/pacotes/detalhes', 'pacote'=>$pacote->id], ['class'=>'button button1', 'style'=>'']) ?></p>
                    </div>
                </div>
            </div>
            <br><br>
        <?php }?>
    </div>


</div>

