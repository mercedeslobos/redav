<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Policias;
use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Exposiciones */
/* @var $form yii\widgets\ActiveForm */

$policias = Policias::find()->all();
$policiasList = ArrayHelper::map($policias,'id','matricula');
$participaDivision = [ 'SI'=>'SI', 'NO'=>'NO'];
?>
<p>
    <?= Html::a('Cargar Otros Involucrados', ['involucrado', 'id' => $modelExposicion->siniestros_id], ['class' => 'btn btn-primary']) ?>
</p>

<div class="exposiciones-form">
        <?php $form = ActiveForm::begin ( [ 
                    'id' => $modelExposicion->formName () ,
                    'layout' => 'horizontal' ,
                    'class' => 'form-horizontal' ,
                    'fieldConfig' => [
                        'enableError' => true ,
                        'options' => [
                            'class' => ''
                        ]
            ] ] ); ?>
        <div class="row">
            <?= $form->field($modelExposicion, 'nro',[
                'template' => '<div class="col-sm-2"><label>Nro. de Exposición</label></div>
                               <div class="col-sm-4">{input}{error}</div>' 
                                ])->textInput(['maxlength' => true]) ?>
            <?= $form->field($modelExposicion, 'fecha',[
                    'template' => '<div class="col-sm-1">{label}</div>
                                   <div class="col-sm-2">{input}{error}</div>' 
                                   ])->widget(DatePicker::className(),[
                                        'dateFormat' => 'yyyy-MM-dd',
                                        'clientOptions' => [
                                            'yearRange' => '-115:+0',
                                            'changeYear' => true],
                                            'options' => ['class' => 'form-control', 'style' => 'width:100%']
                                    ]) ?>
        </div>
        <div class="row">
            <?= $form->field($modelExposicion, 'policias_id', [
                'template' => '<div class="col-sm-2"><label>Matrícula</label></div>
                               <div class="col-sm-4">{input}{error}</div>'
                ])->dropDownList($policiasList, ['prompt' => 'Seleccione la Matrícula','style'=>'width:200px']);?>
            <?= $form->field($modelExposicion, 'participa_division',[
                'template' => '<div class="col-sm-1">{label}</div>
                               <div class="col-sm-2">{input}{error}</div>' 
                                ])->dropDownList($participaDivision, ['prompt' => 'Seleccione']) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
