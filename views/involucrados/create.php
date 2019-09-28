<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Involucrados */

$this->title = Yii::t('app', 'Create Involucrados');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Involucrados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="involucrados-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
