<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Collapse;
?>

<div class="container-fluid" style="background-color:#aaa">
<div>
<div class="jumbotron" style="padding-top: 10px; padding-bottom: 10px" >
    <h1>Estadísticas</h1>
</div>
<h4>
<p style="text-align: justify; margin-left: 40px; margin-right: 40px;">
    De acuerdo a la información brindada por el Observatorio Vial Nacional en el año 2018 
    se establece que en Argentina mueren aproximadamente 5.000 personas al año como consecuencia de los 
    siniestros viales. Según datos de la Dirección de Estadísticas e Información en Salud (DEIS) del 
    Ministerio de Salud de la Nación, las muertes por causa externa -donde se incluyen las defunciones 
    por lesiones de tránsito- representan hoy en el país la cuarta causa de muerte, siendo la principal 
    en personas de 15 a 34 años de edad. Si bien los ocupantes de automóviles explican a la mayoría de 
    las muertes por lesiones de tránsito, la tasa de mortalidad en ocupantes de moto vehículos viene 
    incrementándose en los últimos años, acentuándose una problemática que afecta principalmente a los 
    usuarios vulnerables de las vías de tránsito.</p>
<p style="text-align: justify; margin-left: 40px; margin-right: 40px;">
    Motivo por el cual consideramos que las estadísticas en seguridad vial son fundamentales para 
    poder dimensionar la problemática, identificar los segmentos de mayor riesgo y analizar las 
    alternativas de solución adecuadas para cada zona problemática de la Capital de la provincia 
    de La Rioja.</p>
<p style="text-align: justify; margin-left: 40px; margin-right: 40px;">
    Por lo que contar con estimaciones de los acontecimientos asociados a los siniestros viales 
    ocurridos en la jurisdicción de la División de accidentes viales (Talamuyuna hasta el Cebollar, 
    rutas nacionales y provinciales) resulta relevante para lograr un mayor nivel de sensibilización 
    social sobre el tema, una coordinación adecuada entre los entes gubernamentales correspondientes 
    para mejorar o dar soluciones en los lugares con mayor frecuencia de accidentes. </p>
</h4>
    <div class="jumbotron" style="padding-top: 20px; padding-bottom: 20px" >
            <?= Html::img('@web/documentos/estadisticas/Cantidad-de-decesos_general.png', ['alt'=>'ReDAV', 'class'=>'thing']);?>
            
    </div>
    <div class="jumbotron" style="padding-top: 20px; padding-bottom: 20px" >
            <?= Html::img('@web/documentos/estadisticas/Cantidad-de-involucrados_general.png', ['alt'=>'ReDAV', 'class'=>'thing']);?>
            
    </div>
    
<?php  echo Collapse::widget([
      'items' => [
          // equivalent to the above
          [
              'label' => 'AÑO 2016',
              'content' => '<p style="text-align: justify; margin-left: 40px; margin-right: 40px;">
                7.268 muertes anuales por siniestros viales en Argentina en el año 2016.<br>
                70 decesos por siniestros viales en la Provincia de la Rioja en el año 2016.<br>
                Tipo de siniestro:<br>
                • Vuelcos: 12 decesos<br>
                • Colisión auto-moto: 13 decesos<br>
                • Por caída: 14 decesos<br>
                • Colisión moto-animal: 3 decesos<br>
                • Colisión auto-animal: 2 decesos <br></p>
                <div class="jumbotron" style="padding-top: 10px; padding-bottom: 10px" >
                <img src="../web/documentos/estadisticas/Decesos-2016.png" 
                alt="" ></div>',
              // open its content by default
              'contentOptions' => ['class' => 'in']
          ],
          // another group item
          [
              'label' => 'AÑO 2017',
              'content' => '<p style="text-align: justify; margin-left: 40px; margin-right: 40px;">
                7.213 muertes anuales por siniestros viales en argentina en el año 2017. El 30,57% de 
                333.642 habitantes están involucrados en siniestros viales.<br>
                102 decesos por siniestros viales en la provincia de La Rioja en el año 2017.<br>
                Tipos de siniestros:<br>
                • Vuelcos: 1 deceso, 17 personas involucradas<br>
                • Colisión:3 decesos, 30 personas involucradas<br>
                • Por caída: 1 deceso, 3 personas involucrados<br>
                • Colisión moto-animal: 1 deceso, 1 persona involucrada<br>
                • Atropellados: 1 deceso, 3 personas involucradas<br>
                En 32 siniestros 30 eran conductores masculinos y 3 eran conductores femeninos<br>
                De los 102 decesos en la provincia, 2.94% fue por colisiones; 0.98% por caída; 
                0.98% por vuelco; 0.91% por colisión con animales <br></p>
              <div class="jumbotron" style="padding-top: 10px; padding-bottom: 10px" >
              <img src="../web/documentos/estadisticas/Decesos-2017.png" 
              alt="Girl in a jacket" ></div>
              <div class="jumbotron" style="padding-top: 0px; padding-bottom: 10px" >
                <img src="../web/documentos/estadisticas/Involucrados-2017.png" 
                alt="" ></div>',
              'contentOptions' => [],
              'options' => [],
          ],
          // if you want to swap out .panel-body with .list-group, you may use the following
          [
              'label' => 'AÑO 2018',
              'content' => '<p style="text-align: justify; margin-left: 40px; margin-right: 40px;">
                7.274 muertes por siniestros anuales en argentina en el año 2018. El 32,36% de los 
                habitantes de la provincia de La Rioja son víctimas fatales, 20 internaciones diarias 
                por siniestros viales.<br>
                124 decesos por siniestros viales en la provincia de La Rioja en el año 2018
                Tipos de siniestro:<br>
                • Vuelcos: 1 decesos, 13 personas involucradas en vuelcos<br>
                • Colisión: 8 decesos, 41 involucrados<br>
                • Por caída: 4 decesos, 4 involucrados<br>
                • Colisión moto-animal:<br>
                • Colisión auto-animal: <br></p>
              <div class="jumbotron" style="padding-top: 10px; padding-bottom: 10px" >
              <img src="../web/documentos/estadisticas/Decesos-2018.png" 
              alt="Girl in a jacket" ></div>
              <div class="jumbotron" style="padding-top: 0px; padding-bottom: 10px" >
                <img src="../web/documentos/estadisticas/Involucrados-2018.png" 
                alt="Girl in a jacket" ></div>',
              'contentOptions' => [],
              'options' => [],
              'footer' => 'Footer' // the footer label in list-group
          ],
          [
            'label' => 'AÑO 2019',
            'content' => '<p style="text-align: justify; margin-left: 40px; margin-right: 40px;">
                        Desde el mes de enero al mes de septiembre del corriente año se pudo 
                        constatar por las publicaciones en diarios de la capital de la provincia 
                        la siguiente información.<br>
                        Tipos de siniestros:<br>
                        • Vuelcos: 0 decesos, 7 personas involucradas en vuelcos<br>
                        • Colisión: 3 decesos, 29 involucrados<br>
                        • Por caída: 1 decesos<br>
                        • Colisión moto-animal: - <br>
                        • Colisión auto-animal: - <br></p>
            <div class="jumbotron" style="padding-top: 10px; padding-bottom: 10px" >
            <img src="../web/documentos/estadisticas/Decesos-2019.png" 
            alt="Girl in a jacket" ></div>
            <div class="jumbotron" style="padding-top: 0px; padding-bottom: 10px" >
            <img src="../web/documentos/estadisticas/Involucrados-2019.png" 
            alt="Girl in a jacket" ></div>',
            'contentOptions' => [],
            'options' => [],
            'footer' => 'Footer' // the footer label in list-group
        ],
      ]
  ]);
 ?>
 </div>

</div>