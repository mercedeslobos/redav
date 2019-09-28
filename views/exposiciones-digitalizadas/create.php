<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ExposicionesDigitalizadas */

$this->title = Yii::t('app', 'Create Exposiciones Digitalizadas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Exposiciones Digitalizadas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exposiciones-digitalizadas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
