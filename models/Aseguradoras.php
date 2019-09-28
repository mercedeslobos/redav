<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aseguradoras".
 *
 * @property string $id
 * @property string $nombre
 *
 * @property Vehiculos[] $vehiculos
 */
class Aseguradoras extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aseguradoras';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculos()
    {
        return $this->hasMany(Vehiculos::className(), ['aseguradora_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return AseguradorasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AseguradorasQuery(get_called_class());
    }
}
