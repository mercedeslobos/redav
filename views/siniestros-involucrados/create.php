<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiniestrosInvolucrados */

$this->title = Yii::t('app', 'Create Siniestros Involucrados');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Siniestros Involucrados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siniestros-involucrados-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
