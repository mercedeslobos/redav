<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ExposicionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Exposiciones');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exposiciones-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Exposiciones'), ['create'], ['class' => 'btn btn-info']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nro',
            'fecha',
            [
                'attribute'=>'policias_id',
                'label' => 'Matricula',
                'value'=>'policias.matricula',
            ],  
            'participa_division',
            //'siniestros_id',

            ['class' => 'yii\grid\ActionColumn',
            'header' => 'Acciones',
            'contentOptions' => ['style' => 'width:100px; white-space: normal;'],
            'template' => '{print} {view} {update} {delete}',
            'buttons' => [
                'print' => function ($url,$model) {
                    return Html::a('<span class="glyphicon glyphicon-print"></span>',['exposiciones/impresion','idS'=>$model->siniestros_id], ['title' => 'Imprimir']);
                    },
                'update' => function ($url) {
                    return Html::a('<span class="glyphicon glyphicon-pencil "></span>', ['exposiciones/create'], [
                    	'title' =>  'Editar', 'data-confirm' => 'SI DESEA ENMENDAR UNA EXPOSICION YA CARGADA DEBERÁ GENERAR UN NUEVO REGISTRO CON EL MISMO NRO DE EXPOSICIÓN']);
                        },
                'view' => function ($url,$model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',['exposiciones/view','idS'=>$model->siniestros_id], ['title' => 'Ver']);
        
                    },

        ],

        
        ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
