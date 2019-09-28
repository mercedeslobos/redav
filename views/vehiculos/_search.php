<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VehiculosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehiculos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tipo') ?>

    <?= $form->field($model, 'marca') ?>

    <?= $form->field($model, 'modelo') ?>

    <?= $form->field($model, 'dominio') ?>

    <?php // echo $form->field($model, 'nro_motor') ?>

    <?php // echo $form->field($model, 'nro_chasis') ?>

    <?php // echo $form->field($model, 'aseguradora_id') ?>

    <?php // echo $form->field($model, 'nro_poliza') ?>

    <?php // echo $form->field($model, 'tipo_transporte') ?>

    <?php // echo $form->field($model, 'uso') ?>

    <?php // echo $form->field($model, 'tipo_carga') ?>

    <?php // echo $form->field($model, 'carga_asegurada') ?>

    <?php // echo $form->field($model, 'cirulacion') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'desperfectos') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
