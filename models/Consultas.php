<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "consultas".
 *
 * @property string $id
 * @property string $usuarios_id
 * @property string $fecha
 * @property int $exposicion_consultada
 *
 * @property Usuarios $usuarios
 */
class Consultas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consultas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuarios_id', 'exposicion_consultada'], 'required'],
            [['usuarios_id', 'exposicion_consultada'], 'integer'],
            [['fecha'], 'safe'],
            [['usuarios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuarios_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'usuarios_id' => Yii::t('app', 'Usuarios ID'),
            'fecha' => Yii::t('app', 'Fecha'),
            'exposicion_consultada' => Yii::t('app', 'Exposicion Consultada'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuarios_id']);
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
