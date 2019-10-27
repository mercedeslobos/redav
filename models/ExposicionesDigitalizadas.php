<?php

namespace app\models;

use Yii;

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
    public $image;
     
    public function rules()
    {
        return [
            [['archivo', 'fecha_siniestro', 'nro_exposicion'], 'required'],
            [['fecha_siniestro'], 'safe'],
            [['nro_exposicion'], 'integer'],
            [['archivo'], 'string', 'max' => 50],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
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
}
