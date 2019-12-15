<?php
use app\models\Policias;
use app\models\Exposiciones;
use app\models\Siniestros;
use app\models\Personas;
use app\models\Vehiculos;
// $idS = _GET($idS);
$idS = 30;
	$modelExposicion = Exposiciones::findOne(['siniestros_id' => $idS]);
    $modelSiniestro = Siniestros::findOne($idS);
    $modelPersona = Personas::findOne(['siniestros_id' => $idS]);
	$modelVehiculo = Vehiculos::findOne(['siniestros_id' => $idS]);
	?>
<div class="container-fluid" style="background-color:#aaa">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<form>
  <div class="form-row">
  <!-- DATOS DEL SINIESTRO -->
    <div class="form-group col-md-6">
	
      <label for="inputEmail4">FECHA DEL SINIESTRO</label> <?php echo ($modelSiniestro->fecha);?>
      <input type="text" class="form-control" readonly class="form-control-plaintext" id="inputEmail4" value=<?php echo ($modelSiniestro->fecha);?>>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">HORA DEL HECHO</label>
      <input type="text" class="form-control" readonly class="form-control-plaintext" id="inputPassword4" value="<?php echo ($modelSiniestro->hora); ?>" />
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">LUGAR DEL SUCESO</label>
    <input type="text" class="form-control"  readonly class="form-control-plaintext" id="inputAddress" value="<?php echo ($modelSiniestro->lugar); ?>" />
  </div>
  <!-- END DATOS DEL SINIESTRO -->
<!-- DATOS DEL CONDUCTOR -->

  </div>
</form>

</div>

<form id="w0" action="/redav/web/index.php?r=exposiciones%2Fview&amp;idS=30" method="post">
<input type="hidden" name="_csrf" value="CK1kgH0l7jFIInDnUTKUziWidF0xhMdtpG-rYzPvyyZN1CfBEVS2RQoPHIsiXPGsfPMBGAewth3lMNExStelEg=="><div class="container-fluid" style="background-color:#aaa">
<!-- DATOS DEL SINIESTRO -->
<div class="row">
	<div class="col-sm">
		 <div class="form-group field-siniestros-fecha required">
<div class="col-sm-2">FECHA DEL SINIESTRO</div>
						   <div class="col-sm-4"><input type="text" id="siniestros-fecha" class="form-control" name="Siniestros[fecha]" value="2019-12-01" disabled aria-required="true"></div>
</div>            <div class="form-group field-siniestros-hora required">
<div class="col-sm-2">HORA DEL HECHO</div>
						   <div class="col-sm-4"><input type="text" id="siniestros-hora" class="form-control" name="Siniestros[hora]" value="01" disabled maxlength="20" aria-required="true"></div>
</div>      
	</div>     
</div> 
<div class="row">
	<div class="col-sm">
		<div class="form-group field-siniestros-lugar required">
<div class="col-sm-2">LUGAR DEL SUCESO</div>
							<div class="col-sm-10"><input type="text" id="siniestros-lugar" class="form-control" name="Siniestros[lugar]" value="hhgkjh" disabled aria-required="true"><p class="help-block help-block-error"></p></div>
</div>        </div>
</div>
<!-- END DATOS DEL SINIESTRO -->

<!-- DATOS DEL CONDUCTOR -->
<div class="row">
	<div class="col-sm">
		<div class="form-group field-personas-apellido required">
<div class="col-sm-2">APELLIDO Y NOMBRE</div>
							<div class="col-sm-10"><input type="text" id="personas-apellido" class="form-control" name="Personas[apellido]" value="Castro" disabled maxlength="50" aria-required="true"></div>
</div>        </div>
</div>
<div class="row">
	<div class="col-sm">
		 <div class="form-group field-personas-tipo_documento required">
<div class="col-sm-2">TIPO DOC.</div>
						   <div class="col-sm-4"><input type="text" id="personas-tipo_documento" class="form-control" name="Personas[tipo_documento]" value="2" disabled maxlength="10" aria-required="true"></div>
</div>            <div class="form-group field-personas-documento required">
<div class="col-sm-2">N°</div>
						   <div class="col-sm-4"><input type="text" id="personas-documento" class="form-control" name="Personas[documento]" value="294491203" disabled maxlength="20" aria-required="true"></div>
</div>        </div>     
</div> 
<div class="row">
	<div class="col-sm">
		<div class="form-group field-personas-razon_social">
<div class="col-sm-2">RAZON SOCIAL</div>
							<div class="col-sm-10"><input type="text" id="personas-razon_social" class="form-control" name="Personas[razon_social]" value="" disabled maxlength="100"><p class="help-block help-block-error"></p></div>
</div>        </div>
</div>
<div class="row">
	<div class="col-sm">
		<div class="form-group field-personas-direccion required">
<div class="col-sm-2">DOMICILIO</div>
							<div class="col-sm-10"><input type="text" id="personas-direccion" class="form-control" name="Personas[direccion]" value="Ituzaingo n 610" disabled maxlength="250" aria-required="true"><p class="help-block help-block-error"></p></div>
</div>        </div>
</div>
<div class="row">
	<div class="col-sm">
		 <div class="form-group field-personas-localidad required">
<div class="col-sm-2">LOCALIDAD</div>
						   <div class="col-sm-4"><input type="text" id="personas-localidad" class="form-control" name="Personas[localidad]" value="La Rioja" disabled maxlength="50" aria-required="true"></div>
</div>            <div class="form-group field-personas-provincia_id required">
<div class="col-sm-2">PROVINCIA</div>
						   <div class="col-sm-4"><input type="text" id="personas-provincia_id" class="form-control" name="Personas[provincia_id]" value="1" disabled aria-required="true"></div>
</div>        </div>     
</div> 
<div class="row">
	<div class="col-sm">
		 <div class="form-group field-personas-edo_civil required">
<div class="col-sm-2">ESTADO CIVIL</div>
						   <div class="col-sm-4"><input type="text" id="personas-edo_civil" class="form-control" name="Personas[edo_civil]" value="1" disabled maxlength="10" aria-required="true"></div>
</div>            <div class="form-group field-personas-nacionalidad required">
<div class="col-sm-2">NACIONALIDAD</div>
						   <div class="col-sm-4"><input type="text" id="personas-nacionalidad" class="form-control" name="Personas[nacionalidad]" value="Arg" disabled maxlength="50" aria-required="true"></div>
</div>        </div>     
</div> 
<div class="row">
	<div class="col-sm">
		 <div class="form-group field-personas-fecha_nacimiento required">
<div class="col-sm-2">FECHA DE NACIMIENTO</div>
						   <div class="col-sm-4"><input type="text" id="personas-fecha_nacimiento" class="form-control" name="Personas[fecha_nacimiento]" value="2019-11-09" disabled maxlength="10" aria-required="true"></div>
</div>            <div class="form-group field-personas-licencia_nro">
<div class="col-sm-2">POSEE LICENCIA DE CONDUCIR?</div>
						   <div class="col-sm-4"><input type="text" id="personas-licencia_nro" class="form-control" name="Personas[licencia_nro]" value="" disabled maxlength="20"></div>
</div>        </div>     
</div>
<!-- END DATOS DEL CONDUCTOR -->
<!-- DATOS DEL VEHICULO -->

<!-- END DATOS DEL VEHICULO -->

<!-- PIE DEL FORMULARIO -->
<div class="row">
	<div class="col-sm">
		 <div class="form-group field-exposiciones-participa_division required">
<div class="col-sm-6">DIVISION DE ACCIDENTES VIALES <input type="text" id="exposiciones-participa_division" class="form-control" name="Exposiciones[participa_division]" value="si" disabled maxlength="2" aria-required="true"> HA PARTICIPADO DEL SINIESTRO</div>
</div>            <div class="form-group field-exposiciones-fecha required">
<div class="col-sm-2">FECHA</div>
						   <div class="col-sm-4"><input type="text" id="exposiciones-fecha" class="form-control" name="Exposiciones[fecha]" value="1982-12-02" disabled aria-required="true"></div>
</div>        </div>     
</div>
<div class="row">
	<div class="col-sm">
		 <div class="form-group field-exposiciones-policias_id required">
<div class="col-sm-2">POLICIA</div>
						   <div class="col-sm-4"><input type="text" id="exposiciones-policias_id" class="form-control" name="Exposiciones[policias_id]" value="3" disabled aria-required="true"></div>
</div>            <div class="form-group field-exposiciones-nro required">
<div class="col-sm-4"><input type="text" id="exposiciones-nro" class="form-control" name="Exposiciones[nro]" value="1" disabled aria-required="true"></div>
</div>        </div>     
</div>
<!-- END PIE DEL FORMULARIO -->
</div>
</form>
