<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "policias".
 *
 * @property string $id
 * @property string $personas_id
 * @property string $matricula
 * @property string $turno
 *
 * @property Exposiciones[] $exposiciones
 * @property Personas $personas
 */
class Policias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'policias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['personas_id', 'matricula', 'turno'], 'required'],
            [['personas_id'], 'integer'],
            [['matricula'], 'string', 'max' => 15],
            [['turno'], 'string', 'max' => 20],
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
            'matricula' => Yii::t('app', 'Matricula'),
            'turno' => Yii::t('app', 'Turno'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExposiciones()
    {
        return $this->hasMany(Exposiciones::className(), ['policias_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasOne(Personas::className(), ['id' => 'personas_id']);
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
