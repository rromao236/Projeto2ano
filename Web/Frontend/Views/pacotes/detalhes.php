<?php

use app\models\Packageimages;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Activities;

/* @var $this yii\web\View */

$this->title = 'RAR Travels';
?>

<style>
    * {box-sizing:border-box}

    /* Slideshow container */
    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }

    /* Hide the images by default */
    .mySlides {
        display: none;
    }

    /* Next & previous buttons */
    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -22px;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active, .dot:hover {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

    @keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

    .button {
        border: none;
        color: white;
        padding: 16px 32px;
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
        border: 2px solid #2667e0;
    }

    .button1:hover {
        background-color: #2667e0;/*#2667e0  #0000cd*/
        color: white;
    }
</style>

<div class="body-content">

    <div class="site-index">
        <h1 align="center" style="text-transform: uppercase"><?php echo $pacote_detalhe->title; ?></h1>
        <!-- Slideshow container -->
        <div class="slideshow-container">

            <?php
            $imagens = Packageimages::find()
                ->where(['package_id' => $pacote_detalhe->id])
                ->all();


            foreach ($imagens as $imagem){
                ?>

                <!-- Full-width images with number and caption text -->
                <div class="mySlides">
                    <div class="numbertext"></div>
                    <img size="" width="1000px" height="570px" align="center" src="<?php echo Yii ::getAlias('@imageurl'); ?>/<?= $imagem->image?>">
                    <div class="text"></div>
                </div>

                <?php
            }
            ?>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

    </div>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }
    </script>

    <div class="row">
        <div class="col-lg-12" style="text-align: center;">
            <p style="margin-left: 290px; margin-right: 290px; text-align: left;">
                <?php echo $pacote_detalhe->description; ?>
            </p>
            <h3 style="margin-left: 290px; margin-right: 290px; text-align: left;"><u>Detalhes</u></h3>
            <p style="margin-left: 290px; margin-right: 290px; text-align: left;">
                <b>&#8226 </b>Preço: <?php echo $pacote_detalhe->price; ?>€<br>
                <b>&#8226 </b>Rating: <?php switch($pacote_detalhe->rating){
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
                } ?><br><br>
            </p>

            <h3 style="margin-left: 290px; margin-right: 290px; text-align: left;"><u>Atividades</u></h3>
            <p style="margin-left: 290px; margin-right: 290px; text-align: left;">
                <?php foreach($atividades_pacotes as $atividade){
                    $ativ = Activities::find()
                        ->where(['id' => $atividade->id_activity])
                        ->one();
                    ?>
                    <b><?php echo $ativ->name; ?>:</b><br>
                    <b>&#8226 </b>Responsável: <?php echo $atividade->responsible; ?><br>
                    <b>&#8226 </b>Duração: <?php echo $atividade->duration; ?> minutos<br>
                    <b>&#8226 </b>Data e hora: <?php echo DateTime::createFromFormat('Y-m-d H:i:s', $atividade->timestart)->format('d-m-Y, H:i')?><br><br>
                <?php }?>
            </p>

            <h3 style="margin-left: 290px; margin-right: 290px; text-align: left;"><u>Hotel</u></h3>
            <p style="margin-left: 290px; margin-right: 290px; text-align: left;">
                <b><?php echo $hotel->name; ?>:</b><br>
                <b>&#8226 </b>Morada: <?php echo $hotel->adress; ?><br>
                <b>&#8226 </b>Cidade: <?php echo $hotel->city; ?><br>
                <b>&#8226 </b>País: <?php echo $hotel->country; ?><br>
                <b>&#8226 </b>Rating: <?php switch($hotel->rating){
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
                } ?><br>
                <b>&#8226 </b>Descrição: <?php echo $hotel->description; ?><br><br>
            </p>

            <h3 style="margin-left: 290px; margin-right: 290px; text-align: left;"><u>Voo de Ida</u></h3>
            <p style="margin-left: 290px; margin-right: 290px; text-align: left;">
                <b>&#8226 Partida:</b> <?php echo $aeroporto_start->name; ?> <b>|</b> <?php echo DateTime::createFromFormat('Y-m-d H:i:s', $pacote_detalhe->flightstart)->format('d-m-Y, H:i'); ?><br>
                <b>&#8226 Chegada:</b> <?php echo $aeroporto_end->name; ?> <b>|</b> <?php echo DateTime::createFromFormat('Y-m-d H:i:s', $pacote_detalhe->flightend)->format('d-m-Y, H:i'); ?><br><br>
            </p>
            <h3 style="margin-left: 290px; margin-right: 290px; text-align: left;"><u>Voo de Volta</u></h3>
            <p style="margin-left: 290px; margin-right: 290px; text-align: left;">
                <b>&#8226 Partida:</b> <?php echo $aeroporto_end->name; ?> <b>|</b> <?php echo DateTime::createFromFormat('Y-m-d H:i:s', $pacote_detalhe->flightbackstart)->format('d-m-Y, H:i')?><br>
                <b>&#8226 Chegada:</b> <?php echo $aeroporto_start->name; ?> <b>|</b> <?php echo DateTime::createFromFormat('Y-m-d H:i:s', $pacote_detalhe->flightbackend)->format('d-m-Y, H:i')?><br><br>
            </p>
        </div>
        <div style="margin-left: 290px">
            <?= Html::a('COMPRAR', ['/pacotes/compra', 'id_pacote'=>$pacote_detalhe->id], ['class'=>'button button1']) ?>
        </div>
    </div>
</div>
