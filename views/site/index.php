<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'ReDAV Web';
?>
<div class="site-index" style="background-color: #828588;">
    <div class="jumbotron" style="padding-top: 20px; padding-bottom: 20px" >
            <?= Html::img('@web/img/logo-comp-gris.png', ['alt'=>'ReDAV', 'class'=>'thing']);?>
            <h1>Bienvenido!</h1>
            
            <p> 
                <?= Html::a('INGRESAR', ['/site/login'], ['class'=>'btn btn-lg btn-info']) ?>
            </p>
            </div>
    </div>
</div>
