<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use app\models\Personas;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Usuarios');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="usuarios-index">

    <h1><?= Html::encode($this->title) ?></h1>
   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php  
    // $documento = Yii::$app->request->queryParams['PersonasSearch']["documento"];
    // $model= Personas::findOne($documento);
    // print_r ($model); 
    // print($documento);
    ?>

       <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'documento',
            'nombre',
            'apellido',
           
        ],
    ]) ?>
     
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update2','id' => $model->id], ['class' => 'btn btn-primary']) ?>
        
    </p>
   
    
</div>
