<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\ExposicionesDigitalizadas */

$this->title = $model->nro_exposicion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Exposiciones Digitalizadas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="exposiciones-digitalizadas-view">

    <h1><?= Html::encode('Exposición Digitalizada Nro.: '.$this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'nro_exposicion',
            'fecha_siniestro',
            'archivo',            
        ],
    ]) ?>
    <?php 
            Modal::begin([
                'headerOptions' => ['<h2>Pdf</h2>'],
                'toggleButton' => ['label' => 'Ver Archivo Cargado'],
                'size' => Modal::SIZE_LARGE,
                
                ]);
                echo \lesha724\documentviewer\ViewerJsDocumentViewer::widget([
                    'url' => Url::base().'/documentos/digitalizadas/'.$model->archivo, 
                    'width'=>'100%',
                    'height'=>'350px'
                    ]);                
            Modal::end();
        ?>

</div>
