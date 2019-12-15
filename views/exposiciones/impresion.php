<?php
use app\models\Policias;
use app\models\Exposiciones;
use app\models\Siniestros;
use app\models\Personas;
use app\models\Vehiculos;

$idS = Yii::$app->getRequest()->getQueryParam('idS');

	$modelExposicion = Exposiciones::findOne(['siniestros_id' => $idS]);
    $modelSiniestro = Siniestros::findOne($idS);
    $modelPersona = Personas::findAll(['siniestros_id' => $idS]);
	$modelVehiculo = Vehiculos::findAll(['siniestros_id' => $idS]);
	?>
<html>
<head>

</head>
<body>
<form>
	 <!-- DATOS DEL SINIESTRO -->
<table >
  <caption>EXPOSICION POR COLISION</caption>
  <tr>
	<td><b>FECHA DEL SINIESTRO</b></td>
	<td></td>
	<td><b>HORA DEL HECHO</b></td>
  </tr>
  <tr></tr>
  <tr>
	  <td><?php echo htmlspecialchars($modelSiniestro->fecha); ?></td>
	  <td></td>
    <td><?php echo htmlspecialchars($modelSiniestro->hora); ?></td>
  </tr>
  <tr></tr>
  <tr>
	  <td><b>LUGAR DEL SUCESO</b></td>
	  <td></td>
    <td></td>
  </tr>
  <tr></tr>
  <tr>
	  <td><?php echo htmlspecialchars($modelSiniestro->lugar); ?></td>
	  <td></td>
    <td></td>
  </tr>
</table>
   <!-- END DATOS DEL SINIESTRO -->

  <?php for($i=0, $count = count($modelPersona);$i<$count;$i++) {
      $modelP = $modelPersona[$i];
      $modelV = $modelVehiculo[$i];?>
  <!-- DATOS DEL CONDUCTOR -->

  
  <table>
	<tr></tr>
	<tr>
		<th>INVOLUCRADO</th>
	</tr>
	<tr>
		<td><b>APELLIDO Y NOMBRE</b></td>
	</tr>
  <tr></tr>
  <tr>
	<td><?php echo htmlspecialchars($modelP->apellido.', '.$modelP->nombre); ?></td>
  </tr>
  <tr></tr>
</table>
<table>
	<tr></tr>
	<tr>
		<td><b>TIPO DOC.<b></td>
		<td></td>
		<td><b>NRO DOC.</b></td>
	</tr>
  <tr></tr>
  <tr>
	<td><?php echo htmlspecialchars($modelP->tipo_documento); ?></td>
	<td></td>
	<td><?php echo htmlspecialchars($modelP->documento); ?></td>
  </tr>
  <tr></tr>
</table>
<table>
	<tr></tr>
	<tr>
		<td><b>RAZON SOCIAL</b></td>
	</tr>
	<tr></tr>
	<tr>
		<td><?php echo htmlspecialchars($modelP->razon_social); ?></td>
	</tr>
	<tr></tr>
	<tr>
		<td><b>DOMICILIO</b></td>
	</tr>
	<tr>
		<td><?php echo htmlspecialchars($modelP->direccion); ?></td>
	</tr>
</table>
<table>
	<tr></tr>
	<tr>
		<td><b>LOCALIDAD</b></td>
		<td><b>PROVINCIA</b></td>
	</tr>
	<tr></tr>
	<tr>
		<td><?php echo htmlspecialchars($modelP->localidad); ?></td>
		<td><?php echo htmlspecialchars($modelP->provincia->provincia); ?></td>
	</tr>
	<tr></tr>
	<tr>
		<td><b>ESTADO CIVIL</b></td>
		<td><b>NACIONALIDAD</b></td>
	</tr>
	<tr>
		<td><?php echo htmlspecialchars($modelP->edo_civil); ?></td>
		<td><?php echo htmlspecialchars($modelP->nacionalidad); ?></td>
	</tr>
	<tr>
		<td><b>FECHA DE NACIMIENTO</b></td>
		<td><b>POSEE LICENCIA DE CONDUCIR?</b></td>
	</tr>
	<tr>
		<td><?php echo htmlspecialchars($modelP->fecha_nacimiento); ?></td>
		<td><?php echo htmlspecialchars($modelP->licencia_nro); ?></td>
	</tr>
</table>
  <!-- END DATOS DEL CONDUCTOR -->
  <!-- DATOS DEL VEHICULO -->
  <table>
	<tr></tr>
	<tr>
		<td><b>TIPO</b></td>
		<td><b>MARCA</b></td>
		<td><b>MODELO</b></td>
	</tr>
	<tr></tr>
	<tr>
		<td><?php echo htmlspecialchars($modelV->tipo); ?></td>
		<td><?php echo htmlspecialchars($modelV->marca); ?></td>
		<td><?php echo htmlspecialchars($modelV->modelo); ?></td>
	</tr>
	<tr></tr>
	<tr>
		<td><b>DOMINIO<b></td>
		<td><b>MOTOR Nro.</b></td>
		<td><b>CHASIS Nro.</b></td>
	</tr>
	<tr>
		<td><?php echo htmlspecialchars($modelV->dominio); ?></td>
		<td><?php echo htmlspecialchars($modelV->nro_motor); ?></td>
		<td><?php echo htmlspecialchars($modelV->nro_chasis); ?></td>
	</tr>
</table>
<table>
	<tr></tr>
	<tr>
		<td><b>ASEGURADORA</b></td>
		<td><b>Nro. DE POLIZA</b></td>
	</tr>
	<tr></tr>
	<tr>
		<td><?php echo htmlspecialchars($modelV->aseguradora->nombre); ?></td>
		<td><?php echo htmlspecialchars($modelV->nro_poliza); ?></td>
	</tr>
</table>
<table>
	<tr></tr>
	<tr>
		<td><b>T. DE TRANSPORTE</b></td>
		<td><b>USOS</b></td>
		<td><b>TIPO DE CARGA</b></td>
		<td><b>CARGA ASEGURADA</b></td>
	</tr>
	<tr></tr>
	<tr>
		<td><?php echo htmlspecialchars($modelV->tipo_transporte); ?></td>
		<td><?php echo htmlspecialchars($modelV->uso); ?></td>
		<td><?php echo htmlspecialchars($modelV->tipo_carga); ?></td>
		<td><?php echo htmlspecialchars($modelV->carga_asegurada); ?></td>
	</tr>
</table>
<table>
	<tr></tr>
	<tr>
		<td><b>CIRCULACION</b></td>
	</tr>
	<tr></tr>
	<tr>
		<td><?php echo htmlspecialchars($modelV->circulacion); ?></td>
	</tr>
	<tr>
		<td><b>OBSERVACIONES</b></td>
	</tr>
	<tr></tr>
	<tr>
		<td><?php echo htmlspecialchars($modelV->observaciones); ?></td>
	</tr>
	<tr>
		<td><b>DESPERFECTOS</b></td>
	</tr>
	<tr></tr>
	<tr>
		<td><?php echo htmlspecialchars($modelV->desperfectos); ?></td>
	</tr>
</table>
  <!-- END DATOS DEL VEHICULO -->
  <?php } ?>

  <!-- PIE DEL FORMULARIO -->
  <br><br><br>
  <table>
	<tr>
		<td><b>DIVISION DE ACCIDENTES VIALES</b></td>
		<td><?php echo htmlspecialchars($modelExposicion->participa_division);?></td>
		<td><b>HA PARTICIPADO DEL SINIESTRO</b></td>
		<td></td>
		<td></td><td></td>
		<td><b>FECHA</b></td>
	</tr>
	<tr></tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td><td><b> </b></td>
		<td><?php echo htmlspecialchars($modelExposicion->fecha); ?></td>
	</tr>
	<tr></tr>

	</table>
	<br><br>
	<table>
	<tr>
		<td></td>
		<td></td>
		<td><b>POLICIA</b></td>
		<td></td>
		<td></td><td><b> </b></td>
		<td><b>Nro EXP.</b></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><?php echo htmlspecialchars($modelExposicion->policias->matricula); ?></td>
		<td></td>
		<td></td><td><b> </b></td>
		<td><?php echo htmlspecialchars($modelExposicion->nro); ?></td>
	</tr>
</table>

  <!-- END PIE DEL FORMULARIO -->
    
</form>
  </body>
  </html>