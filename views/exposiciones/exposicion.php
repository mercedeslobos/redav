<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Exposiciones */

$this->title = Yii::t('app', 'Create Exposiciones');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Exposiciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exposiciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formExposicion', [
        // 'id' => $modelSiniestro->id,
        // 'modelSiniestro' => $modelSiniestro,
        'modelExposicion' => $modelExposicion
    ]) ?>

</div>
