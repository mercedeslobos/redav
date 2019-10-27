<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "exposiciones_digitalizadas".
 *
 * @property string $id
 * @property string $archivo
 * @property string $fecha_siniestro
 * @property int $nro_exposicion
 * @property array $avatar generated filename on server
 * @property string $filename source filename from client
 */
class ExposicionesDigitalizadas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exposiciones_digitalizadas';
    }

    /**
     * {@inheritdoc}
     * 
     * 
    * @var mixed image the attribute for rendering the file input
    * widget for upload on the form
    */
    public $fileup;
     
    public function rules()
    {
        return [
            [['archivo', 'fecha_siniestro', 'nro_exposicion'], 'required'],
            [['fecha_siniestro'], 'safe'],
            [['nro_exposicion'], 'integer'],
            [['archivo'], 'string', 'max' => 50],
            [['fileup'], 'safe'],
            [['fileup'], 'file', 'extensions'=>'jpg, pdf, png'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'archivo' => Yii::t('app', 'Archivo'),
            'fecha_siniestro' => Yii::t('app', 'Fecha Siniestro'),
            'nro_exposicion' => Yii::t('app', 'Nro Exposicion'),
            'fileup' => Yii::t('app','File'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ExposicionesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ExposicionesQuery(get_called_class());
    }

     /**
     * fetch stored image file name with complete path 
     * @return string
     */
    public function getFile() 
    {
        return isset($this->archivo) ? Yii::$app->params['uploadPath'] . $this->archivo : null;
    }

    /**
     * fetch stored image url
     * @return string
     */
    public function getFileUrl() 
    {
        // return a default image placeholder if your source avatar is not found
        $archivo = isset($this->archivo) ? $this->archivo : 'default_user.jpg';
        return Yii::$app->params['uploadUrl'] . $archivo;
    }

    /**
    * Process upload of image
    *
    * @return mixed the uploaded image instance
    */
    public function uploadFile() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $fileup = UploadedFile::getInstance($this, 'fileup');

        // if no image was uploaded abort the upload
        if (empty($fileup)) {
            return false;
        }

        // store the source file name
        $this->archivo = $fileup->name;
        $ext = end((explode(".", $fileup->name)));

        // the uploaded image instance
        return $fileup;
    }

    /**
    * Process deletion of image
    *
    * @return boolean the status of deletion
    */
    public function deleteFile() {
        $file = $this->getFile();

        // check if file exists on server
        if (empty($file) || !file_exists($file)) {
            return false;
        }

        // check if uploaded file can be deleted on server
        if (!unlink($file)) {
            return false;
        }

        // if deletion successful, reset your file attributes
        $this->archivo = null;

        return true;
    }
}

