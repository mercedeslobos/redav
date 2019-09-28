<?php

namespace app\controllers;

use Yii;
use app\models\Usuarios;
use app\models\Personas;
use app\models\Policias;
use app\models\UsuariosSearch;
use app\models\PersonasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\config\AccessRule;


/**
 * UsuariosController implements the CRUD actions for Usuarios model.
 */
class UsuariosController extends Controller
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
                'only' => ['index', 'view','create','update','delete','consulta','resultado','carga','update2','view2'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view','create','update','delete','consulta','resultado','carga','update2','view2'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action){
                            $valid_roles = [Usuarios::ROLE_ADMIN];
                            return Usuarios::roleInArray($valid_roles);
                        }
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
    }
   
    /**
     * Lists all Usuarios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuariosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuarios model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Usuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $width = 15;
        $model = new Usuarios();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) { 
            $model->password = Yii::$app->security->generatePasswordHash($model->password); // Hash the password before you save it. 
            $model->authKey = Yii::$app->security->generateRandomString(20);
            if($model->save()) 
                return $this->redirect(['view', 'id' => $model->id]); 
            } 

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // } CODIGO ORIGINAL

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Usuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) { 
            $model->password = Yii::$app->security->generatePasswordHash($model->password); // Hash the password before you save it. 
            if($model->save()) 
                return $this->redirect(['view', 'id' => $model->id]); 
            } 
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Usuarios model.
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
     * Finds the Usuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Usuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuarios::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**Nuevas Vistas de Usuarios */
    public function actionConsulta()
    {
        $searchModel = new PersonasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('consultadoc', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=> $searchModel,
        ]);
    }

    public function actionResultado()
    {
        $documento = Yii::$app->request->queryParams['PersonasSearch']["documento"];
        $model = Personas::findOne(['documento' => $documento]);
        if ($model !== null) {
            Yii::$app->session->setFlash('success', "Se encontró un usuario cargado con ese documento.");
            return $this->render('consultadocres', [
                'model' => $model,
            ]);  
        }
        else{
            Yii::$app->session->setFlash('success', "Cargue los datos del nuevo usuario.");
            $model = new Personas();
            $model2 = new Policias();
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $model2->personas_id = $model->id;
                if ($model2->load(Yii::$app->request->post()) && $model2->save()) {
                Yii::$app->session->setFlash('success', "Datos personales Cargados.");
                return $this->redirect(['view2', 'id' => $model->id]);
                }
            }
    
            return $this->render('cargapersona', [
                'model' => $model,
                'documento'=>$documento,
                'model2' =>$model2,
            ]);
        }
           
    } 
// eliminar esta seccion
    public function actionCarga()
    {
        $model = new Personas();
        $model2 = new Policias();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model2->personas_id = $model->id;
            if ($model2->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view2', 'id' => $model->id]);
            }
        }

        return $this->render('cargapersona', [
            'model' => $model,'model2' =>$model2
        ]);
    }
// 
    public function actionUpdate2($id)
    {
        $model = Personas::findOne($id);
        $model2 = Policias::findOne(['personas_id' => $id]);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model2->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view2', 'id' => $model->id]);
            }
        }

        return $this->render('update2', [
            'model' => $model,'model2' => $model2,
        ]);
    }

    public function actionView2($id)
    {
        $model = Personas::findOne($id);

        return $this->render('view2', [
            'model' => $model = Personas::findOne($id),
        ]);
    }
}
