<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Policias */

$this->title = Yii::t('app', 'Create Policias');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Policias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="policias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
