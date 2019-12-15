<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Personas;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$modelPersona = Personas::findOne($model->personas_id);
?>
<div class="usuarios-view">

    <h1><?= Html::encode('Usuario: '.$this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $modelPersona,
        'attributes' => [
            [
                'attribute' => 'tipo_documento',
                'value' => $modelPersona->tipo_documento,
                ],
            'documento',
            'nombre',
            'apellido',
            'edad',
            'fecha_nacimiento',
            [   
                'attribute'=> 'edo_civil',
                'value' =>  $modelPersona->edo_civil,
                ],
            'direccion',
            'localidad',
            [   
                'attribute'=> 'provincia_id',
                'value' =>  $modelPersona->provincia->provincia,
                ],
            'nacionalidad',
        ],
    ]) ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'personas_id',
            'email:email',
            'username',
           // 'password:ntext',
        ],
    ]) ?>

</div>
