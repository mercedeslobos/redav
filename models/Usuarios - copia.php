<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property string $id
 * @property string $personas_id
 * @property string $email
 * @property string $usuario
 * @property string $clave
 *
 * @property Consultas[] $consultas
 * @property Personas $personas
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['personas_id', 'email', 'usuario', 'clave'], 'required'],
            [['personas_id'], 'integer'],
            [['clave'], 'string'],
            [['email'], 'string', 'max' => 30],
            [['usuario'], 'string', 'max' => 15],
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
            'email' => Yii::t('app', 'Email'),
            'usuario' => Yii::t('app', 'Usuario'),
            'clave' => Yii::t('app', 'Clave'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consultas::className(), ['usuarios_id' => 'id']);
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
     * @return UsuariosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuariosQuery(get_called_class());
    }
}
