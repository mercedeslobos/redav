<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "siniestros_involucrados".
 *
 * @property string $id
 * @property string $siniestros_id
 * @property string $involucrados_id
 * @property string $vehiculos_id
 *
 * @property Involucrados $involucrados
 * @property Siniestros $siniestros
 * @property Vehiculos $vehiculos
 */
class SiniestrosInvolucrados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'siniestros_involucrados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['siniestros_id', 'involucrados_id', 'vehiculos_id'], 'required'],
            [['siniestros_id', 'involucrados_id', 'vehiculos_id'], 'integer'],
            [['involucrados_id'], 'exist', 'skipOnError' => true, 'targetClass' => Involucrados::className(), 'targetAttribute' => ['involucrados_id' => 'id']],
            [['siniestros_id'], 'exist', 'skipOnError' => true, 'targetClass' => Siniestros::className(), 'targetAttribute' => ['siniestros_id' => 'id']],
            [['vehiculos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehiculos::className(), 'targetAttribute' => ['vehiculos_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'siniestros_id' => Yii::t('app', 'Siniestros ID'),
            'involucrados_id' => Yii::t('app', 'Involucrados ID'),
            'vehiculos_id' => Yii::t('app', 'Vehiculos ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvolucrados()
    {
        return $this->hasOne(Involucrados::className(), ['id' => 'involucrados_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiniestros()
    {
        return $this->hasOne(Siniestros::className(), ['id' => 'siniestros_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculos()
    {
        return $this->hasOne(Vehiculos::className(), ['id' => 'vehiculos_id']);
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
