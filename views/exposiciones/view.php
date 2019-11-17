<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Exposiciones */

$this->title = $modelExposicion->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Exposiciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="exposiciones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $modelExposicion->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $modelExposicion->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $modelSiniestro,
        'attributes' => [
            // 'id',
            'fecha',
            'hora',
            'lugar:ntext',
        ],
    ]) ?>
    
    <?= DetailView::widget([
        'model' => $modelPersona,
        'attributes' => [
            // 'id',
            'tipo_documento',
            'nombre',
            'apellido',
            'edad',
            'fecha_nacimiento',
            'edo_civil',
            'direccion',
            'localidad',
            'provincia_id',
            'nacionalidad',
        ],
    ]) ?>
    
    <?= DetailView::widget([
        'model' => $modelVehiculo,
        'attributes' => [
           // 'id',
            'tipo',
            'marca',
            'modelo',
            'dominio',
            'nro_motor',
            'nro_chasis',
            'aseguradora_id',
            'nro_poliza',
            'tipo_transporte',
            'uso',
            'tipo_carga',
            'carga_asegurada',
            'circulacion',
            'observaciones',
            'desperfectos',
        ],
    ]) ?>
    <?= DetailView::widget([
        'model' => $modelExposicion,
        'attributes' => [
            // 'id',
            'nro',
            'fecha',
            'policias_id',
            'participa_division',
            //'siniestros_id',
        ],
    ]) ?>

</div>
