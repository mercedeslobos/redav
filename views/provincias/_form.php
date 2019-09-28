<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Paises;

/* @var $this yii\web\View */
/* @var $model app\models\Provincias */
/* @var $form yii\widgets\ActiveForm */
$paises=Paises::find()->all();
$paisList=ArrayHelper::map($paises,'id','pais');
?>

<div class="provincias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'provincia')->textInput(['maxlength' => true]) ?>

    <?=  $form->field($model, 'pais_id')->dropDownList($paisList,['prompt'=>'Seleccione un País']);?>
 
   
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
