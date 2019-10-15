<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personas".
 *
 * @property string $id
 * @property string $tipo_documento
 * @property string $documento
 * @property string $nombre
 * @property string $apellido
 * @property string $edad
 * @property string $fecha_nacimiento
 * @property string $edo_civil
 * @property string $direccion
 * @property string $localidad
 * @property string $provincia_id
 * @property string $nacionalidad
 *
 * @property Involucrados[] $involucrados
 * @property Provincias $provincia
 * @property Policias[] $policias
 * @property Usuarios[] $usuarios
 */
class Personas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_documento','documento', 'nombre', 'apellido', 'edad', 'fecha_nacimiento', 'edo_civil', 'direccion', 'localidad', 'provincia_id', 'nacionalidad'], 'required'],
            [['provincia_id'], 'integer'],
            [['tipo_documento', 'fecha_nacimiento', 'edo_civil'], 'string', 'max' => 10],
            [['documento','licencia_nro'], 'string', 'max' => 20],
            [['nombre', 'apellido', 'localidad', 'nacionalidad'], 'string', 'max' => 50],
            [['edad'], 'string', 'max' => 2],
            [['direccion'], 'string', 'max' => 250],
            [['documento'], 'unique'],
            [['razon_social'], 'string', 'max' => 100],
            [['provincia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provincias::className(), 'targetAttribute' => ['provincia_id' => 'id']],
            /*Agregar siniestros_id*/
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tipo_documento' => Yii::t('app', 'Tipo Documento'),
            'documento' => Yii::t('app', 'Documento'),
            'nombre' => Yii::t('app', 'Nombre'),
            'apellido' => Yii::t('app', 'Apellido'),
            'edad' => Yii::t('app', 'Edad'),
            'fecha_nacimiento' => Yii::t('app', 'Fecha Nacimiento'),
            'edo_civil' => Yii::t('app', 'Edo Civil'),
            'direccion' => Yii::t('app', 'Direccion'),
            'localidad' => Yii::t('app', 'Localidad'),
            'provincia_id' => Yii::t('app', 'Provincia ID'),
            'nacionalidad' => Yii::t('app', 'Nacionalidad'),
            'razon_social' => Yii::t('app', 'Razon Social'),
            'licencia_nro' => Yii::t('app', 'Licencia Nro'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvolucrados()
    {
        return $this->hasMany(Involucrados::className(), ['personas_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvincia()
    {
        return $this->hasOne(Provincias::className(), ['id' => 'provincia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPolicias()
    {
        return $this->hasMany(Policias::className(), ['personas_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['personas_id' => 'id']);
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
