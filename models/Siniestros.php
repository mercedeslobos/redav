<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "siniestros".
 *
 * @property string $id
 * @property string $fecha
 * @property string $hora
 * @property string $lugar
 *
 * @property Exposiciones[] $exposiciones
 * @property SiniestrosInvolucrados[] $siniestrosInvolucrados
 */
class Siniestros extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'siniestros';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha', 'hora', 'lugar'], 'required'],
            [['fecha'], 'safe'],
            [['lugar'], 'string'],
            [['hora'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fecha' => Yii::t('app', 'Fecha'),
            'hora' => Yii::t('app', 'Hora'),
            'lugar' => Yii::t('app', 'Lugar'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExposiciones()
    {
        return $this->hasMany(Exposiciones::className(), ['siniestros_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiniestrosInvolucrados()
    {
        return $this->hasMany(SiniestrosInvolucrados::className(), ['siniestros_id' => 'id']);
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
