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

// $this->title = $modelExposicion->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Exposiciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="exposiciones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $modelExposicion->siniestros_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $modelExposicion->siniestros_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('<i class="fa far fa-hand-point-up"></i> Imprimir Exposición', ['/exposiciones/impresion','idS' => $modelSiniestro->id], [
    'class'=>'btn btn-danger', 
    'target'=>'_blank', 
    'data-toggle'=>'tooltip', 
    'title'=>'Will open the generated PDF file in a new window'
]);?>
    </p>
</div>


<div class="container-fluid" style="background-color:#aaa">
<form>
  <!-- DATOS DEL SINIESTRO -->
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">FECHA DEL SINIESTRO</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelSiniestro->fecha); ?>"/>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">HORA DEL HECHO</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputPassword4" value="<?php echo htmlspecialchars($modelSiniestro->hora); ?>"/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputAddress">LUGAR DEL SUCESO</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputAddress" value="<?php echo htmlspecialchars($modelSiniestro->lugar); ?>"/>
    </div>
  </div>
  <!-- END DATOS DEL SINIESTRO -->
  <?php for($i=0, $count = count($modelPersona);$i<$count;$i++) {
      $modelP = $modelPersona[$i];
      $modelV = $modelVehiculo[$i];?>
  <!-- DATOS DEL CONDUCTOR -->
  <div class="form-row">
  <div class="form-group col-md-12">
  <label >INVOLUCRADO</label>
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="nya">APELLIDO Y NOMBRE</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
      id="nya" value="<?php echo htmlspecialchars($modelP->apellido.', '.$modelP->nombre); ?>"/>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="nya">TIPO</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
      id="nya" value="<?php echo htmlspecialchars($modelP->tipo_documento); ?>"/>
    </div>
    <div class="form-group col-md-3">
      <label for="nya">NRO</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
      id="nya" value="<?php echo htmlspecialchars($modelP->documento); ?>"/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputAddress">RAZON SOCIAL</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputAddress" value="<?php echo htmlspecialchars($modelP->razon_social); ?>"/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputAddress">DOMICILIO</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputAddress" value="<?php echo htmlspecialchars($modelP->direccion); ?>"/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">LOCALIDAD</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelP->localidad); ?>"/>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">PROVINCIA</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelP->provincia_id); ?>"/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">ESTADO CIVIL</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelP->edo_civil); ?>"/>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">NACIONALIDAD</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelP->nacionalidad); ?>"/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">FECHA DE NACIMIENTO</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelP->fecha_nacimiento); ?>"/>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">POSEE LICENCIA DE CONDUCIR?</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelP->licencia_nro); ?>"/>
    </div>
  </div>
  <!-- END DATOS DEL CONDUCTOR -->
  <!-- DATOS DEL VEHICULO -->
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">TIPO</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelV->tipo); ?>"/>
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">MARCA</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelV->marca); ?>"/>
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">MODELO</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelV->modelo); ?>"/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">DOMINIO</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelV->dominio); ?>"/>
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">MOTOR Nro.</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelV->nro_motor); ?>"/>
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">CHASIS Nro.</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelV->nro_chasis); ?>"/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">ASEGURADORA</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelV->aseguradora_id); ?>"/>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nro. DE POLIZA</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelV->nro_poliza); ?>"/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputEmail4">T. DE TRANSPORTE</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelV->tipo_transporte); ?>"/>
    </div>
    <div class="form-group col-md-3">
      <label for="inputEmail4">USOS</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelV->uso); ?>"/>
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">TIPO DE CARGA</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelV->tipo_carga); ?>"/>
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">CARGA ASEGURADA</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelV->carga_asegurada); ?>"/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputAddress">CIRCULACION</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputAddress" value="<?php echo htmlspecialchars($modelV->circulacion); ?>"/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputAddress">OBSERVACIONES</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputAddress" value="<?php echo htmlspecialchars($modelV->observaciones); ?>"/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputAddress">DESPERFECTOS</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputAddress" value="<?php echo htmlspecialchars($modelV->desperfectos); ?>"/>
    </div>
  </div>

  <!-- END DATOS DEL VEHICULO -->
  <?php } ?>

  <!-- PIE DEL FORMULARIO -->
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">FECHA</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
      id="inputEmail4" value="<?php echo htmlspecialchars($modelExposicion->fecha); ?>"/>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">POLICIA</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelExposicion->policias_id); ?>"/>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nro EXP.</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputEmail4" value="<?php echo htmlspecialchars($modelExposicion->nro); ?>"/>
    </div>
    <div class="form-group col-md-3">
      <label for="inputZip">DIVISION DE ACCIDENTES VIALES</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" 
            id="inputZip" value="<?php echo htmlspecialchars($modelExposicion->participa_division); ?>" />
      <label for="inputZip">HA PARTICIPADO DEL SINIESTRO</label>
    </div>
  </div>
  <!-- END PIE DEL FORMULARIO -->
    
</form>

</div>

  
