<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "involucrados".
 *
 * @property string $id
 * @property string $personas_id
 * @property string $razon_social
 * @property string $licencia_nro
 *
 * @property Personas $personas
 * @property SiniestrosInvolucrados[] $siniestrosInvolucrados
 */
class Involucrados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'involucrados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['personas_id', 'razon_social', 'licencia_nro'], 'required'],
            [['personas_id'], 'integer'],
            [['razon_social'], 'string', 'max' => 100],
            [['licencia_nro'], 'string', 'max' => 20],
            [['personas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['personas_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'personas_id' => Yii::t('app', 'Personas ID'),
            'razon_social' => Yii::t('app', 'Razon Social'),
            'licencia_nro' => Yii::t('app', 'Licencia Nro'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasOne(Personas::className(), ['id' => 'personas_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiniestrosInvolucrados()
    {
        return $this->hasMany(SiniestrosInvolucrados::className(), ['involucrados_id' => 'id']);
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
