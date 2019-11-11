<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap" style="background-color: #828588;">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
            'style' => 'background-color: #0D94EA; color: #fff !important;',
        ],
    ]);
    echo Nav::widget([
        'options' => [
                        'class' => 'navbar-nav navbar-right',
                    ],
        'items' => [
            [
                'label' => 'Inicio', 'url' => ['/exposiciones/inicio'],
                'linkOptions' => ['style' => 'color: #fff; ']
            ],
            [
                'label' => 'Opciones',
                'linkOptions' => ['style' => 'color: #fff; '],
                'items' => [
                    '<li class="dropdown-header">Exposiciones</li>',
                    ['label' => 'Generar Exposiciones', 'url' => ['/exposiciones/index']],
                    ['label' => 'Exposiciones Digitalizadas', 'url' => ['/exposiciones-digitalizadas/index']],
                    '<li class="divider"></li>',
                    '<li class="dropdown-header">Estadísticas</li>',
                    ['label' => 'Generar', 'url' => ['#']],
                    ['label' => 'Consultar', 'url' => ['#']]
               ],
            ],
            [
                'label' => 'Ajustes',
                'linkOptions' => ['style' => 'color: #fff; '],
                'items' => [
                    '<li class="dropdown-header">Configuración</li>',
                     ['label' => 'Países', 'url' => ['/paises/index']],                
                     ['label' => 'Provincias', 'url' => ['/provincias/index']],
                     ['label' => 'Aseguradoras', 'url' => ['/aseguradoras/index']],                    
                     '<li class="divider"></li>',
                     '<li class="dropdown-header">Administración</li>',
                     ['label' => 'Usuarios', 'url' => ['/usuarios/index']],
                ],
            ],    

            Yii::$app->user->isGuest ? (
                [
                    'label' => 'Ingresar', 'url' => ['/site/login'],
                    'linkOptions' => ['style' => 'color: #fff;']
                    ]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')', 
                    ['class' => 'btn btn-link logout',
                        'style'=>'color:#323232;']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container" >
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
