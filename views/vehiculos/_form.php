<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vehiculos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehiculos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dominio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nro_motor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nro_chasis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aseguradora_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nro_poliza')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_transporte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_carga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'carga_asegurada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cirulacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desperfectos')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
