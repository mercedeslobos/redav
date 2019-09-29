<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
$id=Yii::$app->request->get('id');
$auth='1'; //valor para formulario que luego es reemplazado en el controlador
$role = [ 0=>'USUARIO', 10=>'ADMIN'];
?>

<div class="usuarios-form">

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
        <?= $form->field($model, 'personas_id')->hiddenInput(['value' => $id,'maxlength' => true,'style'=>'width:100px'])->label(false) ?>
        <?= $form->field($model, 'authKey')->hiddenInput(['value' => $auth,'maxlength' => true,'style'=>'width:100px'])->label(false) ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'email',['template' => '<div class="col-sm-1">{label}</div><div class="col-sm-4">{input}{error}</div>' ])->textInput(['maxlength' => true]) ?>
    </div>
    
    <div class="row">
        <?= $form->field($model, 'username',['template' => '<div class="col-sm-2">{label}<br></div><div class="col-sm-3">{input}{error}</div>' ])->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'password',['template' => '<div class="col-sm-1">{label}<br></div><div class="col-sm-3">{input}{error}</div>{hint}' ])->passwordInput()
                    ->hint('La Clave debe estar entre A-Z/a-z/0-9')
                    ->label('Clave') ?>
    </div>

    <div class="row">
        <?= $form->field($model, 'role', ['template' => '<div class="col-sm-2">{label}</div><div class="col-sm-4">{input}{error}</div>'])->dropDownList($role, ['prompt' => 'Seleccione Uno','style'=>'width:200px']);?>
    </div>
   
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
