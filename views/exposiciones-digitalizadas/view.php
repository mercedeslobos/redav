<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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

</div>
