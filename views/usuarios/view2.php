<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use app\models\Personas;

/* @var $this yii\web\View */
/* @var $model app\models\Personas */

$this->title = $model->documento;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
// $edo_civil = [ 0=>'SOLTERO/A', 1=>'CASADO/A', 2=>'VIUDO/A', 3=>'DIVORCIADO/A'];
// $tipo = [ 0=>'DNI', 1=>'DU',  2=>'LE', 3=>'CI', 4=>'RG', 5=>'CC', 6=>'CIC/CI', 7=>'DUI', 8=>'DPI', 9=>'TDI', 10=>'CURP', 11=>'CIP', 12=>'OTRO'];
?>
<div class="personas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update2', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'crear_usuario'), ['create', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'tipo_documento',
                'value' => $model->tipo_documento,
                ],
            'documento',
            'nombre',
            'apellido',
            'edad',
            'fecha_nacimiento',
            [   
                'attribute'=> 'edo_civil',
                'value' =>  $model->edo_civil,
                ],
            'direccion',
            'localidad',
            [   
                'attribute'=> 'provincia_id',
                'value' =>  $model->provincia->provincia,
                ],
            'nacionalidad',
        ],
    ]) ?>

</div>
