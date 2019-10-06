<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Policias;


/* @var $this yii\web\View */
/* @var $model app\models\Exposiciones */
/* @var $form yii\widgets\ActiveForm */
$policias=Policias::find()->all();
$policiasList=ArrayHelper::map($policias,'id','matricula');
?>

<div class="exposiciones-form">
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
        <div class="row">
            <?= $form->field($model, 'nro',[
                'template' => '<div class="col-sm-2">{label}</div>
                                <div class="col-sm-4">{input}{error}</div>' 
                                ])->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'fecha',[
                'template' => '<div class="col-sm-1">{label}</div>
                                <div class="col-sm-4">{input}{error}</div>' 
                                ])->textInput() ?>
        </div>
        <div class="row">
            <?= $form->field($model, 'policias_id', [
                'template' => '<div class="col-sm-2"><label>Matrícula</label></div>
                <div class="col-sm-4">{input}{error}</div>'
                ])->dropDownList($policiasList, ['prompt' => 'Seleccione la Matrícula','style'=>'width:200px']);?>
            <?= $form->field($model, 'participa_division',[
                'template' => '<div class="col-sm-1">{label}</div>
                                <div class="col-sm-4">{input}{error}</div>' 
                                ])->textInput(['maxlength' => true]) ?>
        </div>
        <div class = "row">
            <?= $form->field($model, 'siniestros_id',[
                'template' => '<div class="col-sm-1">{label}</div>
                                <div class="col-sm-4">{input}{error}</div>' 
                                ])->textInput(['maxlength' => true]) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
