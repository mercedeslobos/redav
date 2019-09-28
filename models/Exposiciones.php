<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "exposiciones".
 *
 * @property string $id
 * @property string $nro
 * @property string $fecha
 * @property string $policias_id
 * @property string $participa_division
 * @property string $siniestros_id
 *
 * @property Policias $policias
 * @property Siniestros $siniestros
 */
class Exposiciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exposiciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nro', 'fecha', 'policias_id', 'participa_division', 'siniestros_id'], 'required'],
            [['nro', 'policias_id', 'siniestros_id'], 'integer'],
            [['fecha'], 'safe'],
            [['participa_division'], 'string', 'max' => 2],
            [['policias_id'], 'exist', 'skipOnError' => true, 'targetClass' => Policias::className(), 'targetAttribute' => ['policias_id' => 'id']],
            [['siniestros_id'], 'exist', 'skipOnError' => true, 'targetClass' => Siniestros::className(), 'targetAttribute' => ['siniestros_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nro' => Yii::t('app', 'Nro'),
            'fecha' => Yii::t('app', 'Fecha'),
            'policias_id' => Yii::t('app', 'Policias ID'),
            'participa_division' => Yii::t('app', 'Participa Division'),
            'siniestros_id' => Yii::t('app', 'Siniestros ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPolicias()
    {
        return $this->hasOne(Policias::className(), ['id' => 'policias_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiniestros()
    {
        return $this->hasOne(Siniestros::className(), ['id' => 'siniestros_id']);
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
