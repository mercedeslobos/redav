<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Provincias;
use app\models\Policias;

/* @var $this yii\web\View */
/* @var $model app\models\Personas */
/* @var $form yii\widgets\ActiveForm */
$tipo = [ 'DNI'=>'DNI', 'DU'=>'DU',  'LE'=>'LE', 'CI'=>'CI', 'RG'=>'RG', 'CC'=>'CC', 'CIC/CI'=>'CIC/CI', 'DUI'=>'DUI', 'DPI'=>'DPI', 'TDI'=>'TDI', 'CURP'=>'CURP', 'CIP'=>'CIP', 'OTRO'=>'OTRO'];
$edo_civil = [ 'SOLTERO/A'=>'SOLTERO/A', 'CASADO/A'=>'CASADO/A', 'VIUDO/A'=>'VIUDO/A', 'DIVORCIAD.'=>'DIVORCIADO/A'];
$provincias=Provincias::find()->all();
$provList=ArrayHelper::map($provincias,'id','provincia');
?>

<div class="personas-form">

    <?php $form = ActiveForm::begin ( [ 
            'id' => $model->formName () ,
            'layout' => 'horizontal' ,
            'class' => 'form-horizontal' ,
            'fieldConfig' => [
                'enableError' => true ,
                'options' => [
                    'class' => ''
                ]
    ] ] ); ?>
    <!-- Agregar datos de policias matricula y turno para cargarse en la misma vista -->
    <div class="row">
        <?= $form->field($model, 'tipo_documento', ['template' => '<div class="col-sm-2">{label}</div><div class="col-sm-4">{input}{error}</div>'])->dropDownList($tipo, ['prompt' => 'Seleccione Uno','style'=>'width:200px']);?>
        <?= $form->field($model, 'documento',['template' => '<div class="col-sm-2">{label}</div><div class="col-sm-4">{input}{error}</div>' ])->textInput(['maxlength' => true]) ?>
    </div>

    <div class="row">
        <?= $form->field($model, 'nombre',['template' => '<div class="col-sm-2">{label}</div><div class="col-sm-4">{input}{error}</div>' ])->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'apellido',['template' => '<div class="col-sm-2">{label}</div><div class="col-sm-4">{input}{error}</div>' ])->textInput(['maxlength' => true]) ?>
    </div>

    <div class="row">
        <?= $form->field($model, 'edad',['template' => '<div class="col-sm-2">{label}</div><div class="col-sm-1">{input}{error}</div>' ])->textInput(['maxlength' => true,'style'=>'width:100px']) ?>
        <?php echo $form->field($model,'fecha_nacimiento',['template' => '<div class="col-sm-1">{label}</div><div class="col-sm-2">{input}{error}</div>' ])->
        widget(DatePicker::className(),[
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'yearRange' => '-115:+0',
                'changeYear' => true],
                'options' => ['class' => 'form-control', 'style' => 'width:100%']
        ]) ?>
        <?= $form->field($model, 'edo_civil', ['template' => '<div class="col-sm-2">{label}</div><div class="col-sm-4">{input}{error}</div>'])->dropDownList($edo_civil, ['prompt' => 'Seleccione Uno','style'=>'width:200px'])?>
    </div>

    <div class="row">
        <?= $form->field($model, 'direccion',['template' => '<div class="col-sm-2">{label}</div><div class="col-sm-4">{input}{error}</div>' ])->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'localidad',['template' => '<div class="col-sm-2">{label}</div><div class="col-sm-4">{input}{error}</div>' ])->textInput(['maxlength' => true]) ?>
    </div>
    
    <div class="row">
        <?= $form->field($model, 'provincia_id',['template' => '<div class="col-sm-2">{label}</div><div class="col-sm-4">{input}{error}</div>'])->dropDownList($provList,['prompt'=>'Seleccione una Provincia'])?>
        <?= $form->field($model, 'nacionalidad',['template' => '<div class="col-sm-2">{label}</div><div class="col-sm-4">{input}{error}</div>' ])->textInput(['maxlength' => true]) ?>
    </div>

    <div class="row">
        <?= $form->field($model2, 'turno',['template' => '<div class="col-sm-2">{label}</div><div class="col-sm-4">{input}{error}</div>'])->textInput(['maxlength' => true])?>
        <?= $form->field($model2, 'matricula',['template' => '<div class="col-sm-2">{label}</div><div class="col-sm-4">{input}{error}</div>' ])->textInput(['maxlength' => true]) ?>
    </div>
    <br>
    <div class="col-sm-2">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>    

    <?php ActiveForm::end(); ?>

</div>
