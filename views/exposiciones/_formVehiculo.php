<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vehiculos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehiculos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelVehiculo, 'tipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelVehiculo, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelVehiculo, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelVehiculo, 'dominio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelVehiculo, 'nro_motor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelVehiculo, 'nro_chasis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelVehiculo, 'aseguradora_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelVehiculo, 'nro_poliza')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelVehiculo, 'tipo_transporte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelVehiculo, 'uso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelVehiculo, 'tipo_carga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelVehiculo, 'carga_asegurada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelVehiculo, 'circulacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelVehiculo, 'observaciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelVehiculo, 'desperfectos')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
