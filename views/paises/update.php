<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Paises */

$this->title = Yii::t('app', 'Update Paises: {name}', [
    'name' => $model->pais,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paises'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pais, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="paises-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
