<?php

namespace app\controllers;

use Yii;
use app\models\Policias;
use app\models\Exposiciones;
use app\models\Siniestros;
use app\models\Personas;
use app\models\Vehiculos;
use app\models\ExposicionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\config\AccessRule;
use kartik\mpdf\Pdf;


/**
 * ExposicionesController implements the CRUD actions for Exposiciones model.
 */
class ExposicionesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $layout = 'internal.php';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view','create','update','delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view','create','update','delete','involucrado',
                        'vehiculo', 'exposicion','impresion'],
                        'roles' => ['@'],
                        // 'matchCallback' => function ($rule, $action){
                        //     $valid_roles = [Usuarios::ROLE_ADMIN];
                        //     return Usuarios::roleInArray($valid_roles);
                        // }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
        //$this->layout = 'internal.php';
    }

    /**
     * Lists all Exposiciones models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExposicionesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Exposiciones model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idS)
    {
        
        return $this->render('view', [
            'modelExposicion'=> $modelExposicion = Exposiciones::findOne([
                'siniestros_id' => $idS
                ]),
            'modelSiniestro'=> $modelSiniestro = Siniestros::findOne($idS),
            'modelPersona'=> $modelPersona = Personas::findAll([
                                            'siniestros_id' => $idS
                                            ]),
            'modelVehiculo'=> $modelVehiculo = Vehiculos::findAll([
                                            'siniestros_id' => $idS
                                            ]),
        ]);
    }

    /**
     * Creates a new Exposiciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelSiniestro = new Siniestros();

        if ($modelSiniestro->load(Yii::$app->request->post()) && $modelSiniestro->save()) {
            return $this->redirect(array('exposiciones/involucrado','id' => $modelSiniestro->id));
        }

        return $this->render('create', [
            'modelSiniestro' => $modelSiniestro
        ]);
    }
    /*
    / Create de Involucrados
    */
    public function actionInvolucrado($id)
    {
        $modelSiniestro = Siniestros::findOne($id);
        $modelPersona = new Personas();
        $modelPersona->siniestros_id = $modelSiniestro->id;

        if ($modelPersona->load(Yii::$app->request->post()) && $modelPersona->save()) {
            return $this->redirect(array('exposiciones/vehiculo','id' => $modelSiniestro->id));
        }
        return $this->render('involucrado', [
            'id' => $modelSiniestro = Siniestros::findOne($id),
            'modelPersona' => $modelPersona,
        ]);
    }

    /*
    / Create de Vehiculos
    */
    public function actionVehiculo($id)
    {
        $modelSiniestro = Siniestros::findOne($id);
        $modelVehiculo = new Vehiculos();
        $modelVehiculo->siniestros_id = $modelSiniestro->id;

        if ($modelVehiculo->load(Yii::$app->request->post()) && $modelVehiculo->save()) {
            // return $this->refresh();
            return $this->redirect(['exposicion','id' => $modelSiniestro->id]);
        }
        return $this->render('vehiculo', [
            'modelSiniestro' => $modelSiniestro = Siniestros::findOne($id),
            'modelVehiculo' => $modelVehiculo
        ]);
    }

     /*
    / Create de Exposicion
    */
    public function actionExposicion($id)
    {
        $modelSiniestro = Siniestros::findOne($id);
        $modelExposicion = new Exposiciones();
        $modelExposicion->siniestros_id = $modelSiniestro->id;

        if ($modelExposicion->load(Yii::$app->request->post()) && $modelExposicion->save()) {
            return $this->redirect(['view','idS' => $modelSiniestro->id]);
        }
        return $this->render('exposicion', [
            'modelSiniestro' => $modelSiniestro = Siniestros::findOne($id),
            'modelExposicion' => $modelExposicion
        ]);
    }
    /**
     * Updates an existing Exposiciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        
        // $model = $this->findModel($id);

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }
       

        // return $this->render('update', [
        //     'model' => $model,
        // ]);

        $modelSiniestro = Siniestros::findOne($id);
        
        if ($modelSiniestro->load(Yii::$app->request->post()) && $modelSiniestro->save()) {
            return $this->redirect(array('exposiciones/involucrado','id' => $modelSiniestro->id));
        }

        return $this->render('create', [
            'modelSiniestro' => $modelSiniestro
        ]);
    }

    /**
     * Deletes an existing Exposiciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Exposiciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Exposiciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Exposiciones::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionInicio()
    {
        return $this->render('inicio');
    }

    // Privacy statement output demo
    public function actionImpresion($idS) {

    $modelExposicion = Exposiciones::findOne(['siniestros_id' => $idS]);
    $modelSiniestro = Siniestros::findOne($idS);
    $modelPersona = Personas::findAll(['siniestros_id' => $idS]);
    $modelVehiculo = Vehiculos::findAll(['siniestros_id' => $idS]);
        
    Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
    $pdf = new Pdf([
        'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
        'destination' => Pdf::DEST_BROWSER,
        'content' => $this->renderPartial('impresion'),
        'format' => Pdf::FORMAT_LEGAL,
        'options' => [
            // any mpdf options you wish to set
        ],
        'methods' => [
            'SetTitle' => 'Exposición - ReDAV',
            'SetSubject' => 'Exposición generada automáticamente por sistema',
            'SetHeader' => ['Exposición por colisión||Generada: ' . date("r")],
            'SetFooter' => ['|Page {PAGENO}|'],
            'SetAuthor' => 'ReDAV',
            // 'SetCreator' => 'Kartik Visweswaran',
            // 'SetKeywords' => 'Krajee, Yii2, Export, PDF, MPDF, Output, Privacy, Policy, yii2-mpdf',
        ]
    ]);
    return $pdf->render();
    }
}
