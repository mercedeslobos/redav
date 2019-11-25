<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Provincias;
use app\models\Policias;

/* @var $this yii\web\View */
/* @var $model app\models\Exposiciones */
$apellidoynombre = $modelPersona->apellido.' '.$modelPersona->nombre;
$this->title = $modelExposicion->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Exposiciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="exposiciones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $modelExposicion->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $modelExposicion->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
    



<?php $form = ActiveForm::begin(); ?>
<div class="container-fluid" style="background-color:#aaa">
    <!-- DATOS DEL SINIESTRO -->
    <div class="row">
        <div class="col-sm">
             <?= $form->field($modelSiniestro, 'fecha', [
                'template' => '<div class="col-sm-2">FECHA DEL SINIESTRO</div>
                               <div class="col-sm-4">{input}</div>' 
                                ])->textInput(['maxlength' => true,'disabled' => true]) ?>
            <?= $form->field($modelSiniestro, 'hora', [
                'template' => '<div class="col-sm-2">HORA DEL HECHO</div>
                               <div class="col-sm-4">{input}</div>' 
                                ])->textInput(['maxlength' => true,'disabled' => true]) ?>
      
        </div>     
    </div> 
    <div class="row">
        <div class="col-sm">
            <?= $form->field($modelSiniestro, 'lugar', [
                    'template' => '<div class="col-sm-2">LUGAR DEL SUCESO</div>
                                <div class="col-sm-10">{input}{error}</div>' 
                                    ])->textInput(['maxlength' => true,'disabled' => true]) ?>
        </div>
    </div>
    <!-- END DATOS DEL SINIESTRO -->

    <!-- DATOS DEL CONDUCTOR -->
    <div class="row">
        <div class="col-sm">
            <?= $form->field($modelPersona, 'apellido', [
                    'template' => '<div class="col-sm-2">APELLIDO Y NOMBRE</div>
                                <div class="col-sm-10">{input}</div>' 
                                    ])->textInput(['maxlength' => true,'disabled' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
             <?= $form->field($modelPersona, 'tipo_documento', [
                'template' => '<div class="col-sm-2">TIPO DOC.</div>
                               <div class="col-sm-4">{input}</div>' 
                                ])->textInput(['maxlength' => true,'disabled' => true]) ?>
            <?= $form->field($modelPersona, 'documento', [
                'template' => '<div class="col-sm-2">N°</div>
                               <div class="col-sm-4">{input}</div>' 
                                ])->textInput(['maxlength' => true,'disabled' => true]) ?>
        </div>     
    </div> 
    <div class="row">
        <div class="col-sm">
            <?= $form->field($modelPersona, 'razon_social', [
                    'template' => '<div class="col-sm-2">RAZON SOCIAL</div>
                                <div class="col-sm-10">{input}{error}</div>' 
                                    ])->textInput(['maxlength' => true,'disabled' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <?= $form->field($modelPersona, 'direccion', [
                    'template' => '<div class="col-sm-2">DOMICILIO</div>
                                <div class="col-sm-10">{input}{error}</div>' 
                                    ])->textInput(['maxlength' => true,'disabled' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
             <?= $form->field($modelPersona, 'localidad', [
                'template' => '<div class="col-sm-2">LOCALIDAD</div>
                               <div class="col-sm-4">{input}</div>' 
                                ])->textInput(['maxlength' => true,'disabled' => true]) ?>
            <?= $form->field($modelPersona, 'provincia_id', [
                'template' => '<div class="col-sm-2">PROVINCIA</div>
                               <div class="col-sm-4">{input}</div>' 
                                ])->textInput(['maxlength' => true,'disabled' => true]) ?>
        </div>     
    </div> 
    <div class="row">
        <div class="col-sm">
             <?= $form->field($modelPersona, 'edo_civil', [
                'template' => '<div class="col-sm-2">ESTADO CIVIL</div>
                               <div class="col-sm-4">{input}</div>' 
                                ])->textInput(['maxlength' => true,'disabled' => true]) ?>
            <?= $form->field($modelPersona, 'nacionalidad', [
                'template' => '<div class="col-sm-2">NACIONALIDAD</div>
                               <div class="col-sm-4">{input}</div>' 
                                ])->textInput(['maxlength' => true,'disabled' => true]) ?>
        </div>     
    </div> 
    <div class="row">
        <div class="col-sm">
             <?= $form->field($modelPersona, 'fecha_nacimiento', [
                'template' => '<div class="col-sm-2">FECHA DE NACIMIENTO</div>
                               <div class="col-sm-4">{input}</div>' 
                                ])->textInput(['maxlength' => true,'disabled' => true]) ?>
            <?= $form->field($modelPersona, 'licencia_nro', [
                'template' => '<div class="col-sm-2">POSEE LICENCIA DE CONDUCIR?</div>
                               <div class="col-sm-4">{input}</div>' 
                                ])->textInput(['maxlength' => true,'disabled' => true]) ?>
        </div>     
    </div>
    <!-- END DATOS DEL CONDUCTOR -->
    <!-- DATOS DEL VEHICULO -->

    <!-- END DATOS DEL VEHICULO -->

    <!-- PIE DEL FORMULARIO -->
    <div class="row">
        <div class="col-sm">
             <?= $form->field($modelExposicion, 'participa_division', [
                'template' => '<div class="col-sm-6">DIVISION DE ACCIDENTES VIALES {input} HA PARTICIPADO DEL SINIESTRO</div>' 
                                ])->textInput(['maxlength' => true,'disabled' => true]) ?>
            <?= $form->field($modelExposicion, 'fecha', [
                'template' => '<div class="col-sm-2">FECHA</div>
                               <div class="col-sm-4">{input}</div>' 
                                ])->textInput(['maxlength' => true,'disabled' => true]) ?>
        </div>     
    </div>
    <div class="row">
        <div class="col-sm">
             <?= $form->field($modelExposicion, 'policias_id', [
                'template' => '<div class="col-sm-2">POLICIA</div>
                               <div class="col-sm-4">{input}</div>' 
                                ])->textInput(['maxlength' => true,'disabled' => true]) ?>
            <?= $form->field($modelExposicion, 'nro', [
                'template' => '<div class="col-sm-4">{input}</div>' 
                                ])->textInput(['maxlength' => true,'disabled' => true]) ?>
        </div>     
    </div>
    <!-- END PIE DEL FORMULARIO -->
</div>
<?php ActiveForm::end(); ?>

   <!--<?= DetailView::widget([ 
        'model' => $modelVehiculo,
        'attributes' => [
            'tipo',
            'marca',
            'modelo',
            'dominio',
            'nro_motor',
            'nro_chasis',
            'aseguradora_id',
            'nro_poliza',
            'tipo_transporte',
            'uso',
            'tipo_carga',
            'carga_asegurada',
            'circulacion',
            'observaciones',
            'desperfectos',
        ],
    ]) ?>
   -->
