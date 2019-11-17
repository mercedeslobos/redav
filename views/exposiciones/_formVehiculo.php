<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Aseguradoras;

/* @var $this yii\web\View */
/* @var $model app\models\Vehiculos */
/* @var $form yii\widgets\ActiveForm */

$aseguradoras = Aseguradoras::find()->all();
$aseguradorasList = ArrayHelper::map($aseguradoras,'id','nombre');
$cargaAseg = [ 0=>'SI', 1=>'NO'];
?>

<div class="vehiculos-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-sm">
                <?= $form->field($modelVehiculo, 'tipo', [
                    'template' => '<div class="col-sm-1">{label}</div>
                                   <div class="col-sm-3">{input}{error}</div>' 
                                    ])->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm">
                <?= $form->field($modelVehiculo, 'marca', [
                    'template' => '<div class="col-sm-1">{label}</div>
                                   <div class="col-sm-3">{input}{error}</div>'
                                ])->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm">
                <?= $form->field($modelVehiculo, 'modelo', [
                    'template' => '<div class="col-sm-1">{label}</div>
                                   <div class="col-sm-3">{input}{error}</div>' 
                                    ])->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <?= $form->field($modelVehiculo, 'dominio', [
                    'template' => '<div class="col-sm-1">{label}</div>
                                   <div class="col-sm-3">{input}{error}</div>'
                                ])->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm">
                <?= $form->field($modelVehiculo, 'nro_motor', [
                    'template' => '<div class="col-sm-1">{label}</div>
                                   <div class="col-sm-3">{input}{error}</div>'
                                ])->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm">
                <?= $form->field($modelVehiculo, 'nro_chasis', [
                    'template' => '<div class="col-sm-1">{label}</div>
                                   <div class="col-sm-3">{input}{error}</div>'
                                ])->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <?= $form->field($modelVehiculo, 'aseguradora_id', [
                    'template' => '<div class="col-sm-1">{label}</div>
                                   <div class="col-sm-3">{input}{error}</div>'
                                ])->dropDownList($aseguradorasList, ['prompt' => 'Seleccione la Aseguradora']);?>
            </div>
            <div class="col-sm">
                <?= $form->field($modelVehiculo, 'nro_poliza', [
                    'template' => '<div class="col-sm-1">{label}</div>
                                   <div class="col-sm-3">{input}{error}</div>'
                                ])->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <?= $form->field($modelVehiculo, 'tipo_transporte', [
                    'template' => '<div class="col-sm-1">{label}</div>
                                   <div class="col-sm-3">{input}{error}</div>'
                                ])->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm">
                <?= $form->field($modelVehiculo, 'uso', [
                    'template' => '<div class="col-sm-1">{label}</div>
                                   <div class="col-sm-3">{input}{error}</div>'
                                ])->textInput(['maxlength' => true]) ?>
            </div>  
        </div>
        <div class="row">
            <div class="col-sm">
                <?= $form->field($modelVehiculo, 'tipo_carga', [
                    'template' => '<div class="col-sm-1">{label}</div>
                                   <div class="col-sm-3">{input}{error}</div>'
                                ])->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm">
                <?= $form->field($modelVehiculo, 'carga_asegurada', [
                    'template' => '<div class="col-sm-1">{label}</div>
                                   <div class="col-sm-2">{input}{error}</div>'
                                ])->dropDownList($cargaAseg, ['prompt' => 'Seleccione']) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <?= $form->field($modelVehiculo, 'circulacion', [
                    'template' => '<div class="col-sm-1">{label}</div>
                                   <div class="col-sm-7">{input}{error}</div>'
                                ])->textArea(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($modelVehiculo, 'observaciones', [
                    'template' => '<div class="col-sm-2">{label}</div>
                                   <div class="col-sm-4">{input}{error}</div>'
                                ])->textArea(['maxlength' => true]) ?>
            </div>
            <div class="col">
                <?= $form->field($modelVehiculo, 'desperfectos', [
                    'template' => '<div class="col-sm-2">{label}</div>
                                   <div class="col-sm-4">{input}{error}</div>'
                                ])->textArea(['maxlength' => true]) ?>
            </div>
        </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
