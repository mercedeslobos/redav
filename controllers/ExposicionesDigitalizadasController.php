<?php

namespace app\controllers;

use Yii;
use app\models\ExposicionesDigitalizadas;
use app\models\ExposicionesDigitalizadasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\config\AccessRule;
use yii\web\UploadedFile;

/**
 * ExposicionesDigitalizadasController implements the CRUD actions for ExposicionesDigitalizadas model.
 */
class ExposicionesDigitalizadasController extends Controller
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
                        'actions' => ['index', 'view','create','update','delete'],
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
    }

    /**
     * Lists all ExposicionesDigitalizadas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExposicionesDigitalizadasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ExposicionesDigitalizadas model.
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
     * Creates a new ExposicionesDigitalizadas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ExposicionesDigitalizadas();

        if ($model->load(Yii::$app->request->post())) {
            // process uploaded image file instance
            $fileup = $model->uploadFile();

            if ($model->save()) {
                // upload only if valid uploaded file instance found
                if ($fileup !== false) {
                    $path = $model->getFile();
                    $fileup->saveAs($path);
                }
                return $this->redirect(['view', 'id'=>$model->id]);
            } else {
                // error in saving model
            }
        }
        return $this->render('create', [
            'model'=>$model,
        ]);
    }

    /**
     * Updates an existing ExposicionesDigitalizadas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldFile = $model->getFile();
        $oldFileName = $model->archivo;

        if ($model->load(Yii::$app->request->post())) {
            // process uploaded image file instance
            $fileup = $model->uploadFile();

            // revert back if no valid file instance uploaded
            if ($fileup === false) {
                $model->archivo = $oldFileName;
            }

            if ($model->save()) {
                // upload only if valid uploaded file instance found
                if ($fileup !== false && unlink($oldFile)) { // delete old and overwrite
                    $path = $model->getFile();
                    $fileup->saveAs($path);
                }
                return $this->redirect(['view', 'id'=>$model->id]);
            } else {
                // error in saving model
            }
        }
        return $this->render('update', [
            'model'=>$model,
        ]);
    }

    /**
     * Deletes an existing ExposicionesDigitalizadas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        // validate deletion and on failure process any exception 
        // e.g. display an error message 
        if ($model->delete()) {
            if (!$model->deleteFile()) {
                Yii::$app->session->setFlash('error', 'Error deleting image');
            }
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the ExposicionesDigitalizadas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return ExposicionesDigitalizadas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ExposicionesDigitalizadas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
