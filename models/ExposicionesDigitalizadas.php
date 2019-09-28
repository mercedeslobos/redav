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
     */
    public function rules()
    {
        return [
            [['archivo', 'fecha_siniestro', 'nro_exposicion'], 'required'],
            [['fecha_siniestro'], 'safe'],
            [['nro_exposicion'], 'integer'],
            [['archivo'], 'string', 'max' => 50],
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
