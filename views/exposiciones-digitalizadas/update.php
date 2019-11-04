<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ExposicionesDigitalizadas */

$this->title = Yii::t('app', 'Update Exposiciones Digitalizadas: {name}', [
    'name' => $model->nro_exposicion,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Exposiciones Digitalizadas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nro_exposicion, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="exposiciones-digitalizadas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
