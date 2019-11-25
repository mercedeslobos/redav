<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
?>

<div class="container-fluid" style="background-color:#aaa">
<?php 
        echo \lesha724\documentviewer\ViewerJsDocumentViewer::widget([
            'url' => Url::base().'/documentos/estadisticas/2016_actualidad.pdf', 
            'width'=>'100%',
            'height'=>'550px'
            ]);                
   
?>
</div>