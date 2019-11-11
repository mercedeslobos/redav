<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehiculos".
 *
 * @property string $id
 * @property string $tipo
 * @property string $marca
 * @property string $modelo
 * @property string $dominio
 * @property string $nro_motor
 * @property string $nro_chasis
 * @property string $aseguradora_id
 * @property string $nro_poliza
 * @property string $tipo_transporte
 * @property string $uso
 * @property string $tipo_carga
 * @property string $carga_asegurada
 * @property string $circulacion
 * @property string $observaciones
 * @property string $desperfectos
 *
 * @property SiniestrosInvolucrados[] $siniestrosInvolucrados
 * @property Aseguradoras $aseguradora
 */
class Vehiculos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehiculos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo', 'marca', 'modelo', 'dominio', 'nro_motor', 'nro_chasis', 'aseguradora_id', 'nro_poliza', 'tipo_transporte', 'uso', 'tipo_carga', 'carga_asegurada', 'circulacion', 'observaciones', 'desperfectos'], 'required'],
            [['aseguradora_id'], 'integer'],
            [['tipo', 'marca', 'dominio'], 'string', 'max' => 20],
            [['modelo', 'nro_poliza', 'tipo_transporte', 'uso'], 'string', 'max' => 50],
            [['nro_motor', 'nro_chasis', 'tipo_carga'], 'string', 'max' => 100],
            [['carga_asegurada'], 'string', 'max' => 2],
            [['circulacion', 'observaciones'], 'string', 'max' => 200],
            [['desperfectos'], 'string', 'max' => 150],
            [['aseguradora_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aseguradoras::className(), 'targetAttribute' => ['aseguradora_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tipo' => Yii::t('app', 'Tipo'),
            'marca' => Yii::t('app', 'Marca'),
            'modelo' => Yii::t('app', 'Modelo'),
            'dominio' => Yii::t('app', 'Dominio'),
            'nro_motor' => Yii::t('app', 'Nro Motor'),
            'nro_chasis' => Yii::t('app', 'Nro Chasis'),
            'aseguradora_id' => Yii::t('app', 'Aseguradora ID'),
            'nro_poliza' => Yii::t('app', 'Nro Poliza'),
            'tipo_transporte' => Yii::t('app', 'Tipo Transporte'),
            'uso' => Yii::t('app', 'Uso'),
            'tipo_carga' => Yii::t('app', 'Tipo Carga'),
            'carga_asegurada' => Yii::t('app', 'Carga Asegurada'),
            'circulacion' => Yii::t('app', 'Circulacion'),
            'observaciones' => Yii::t('app', 'Observaciones'),
            'desperfectos' => Yii::t('app', 'Desperfectos'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiniestrosInvolucrados()
    {
        return $this->hasMany(SiniestrosInvolucrados::className(), ['vehiculos_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAseguradora()
    {
        return $this->hasOne(Aseguradoras::className(), ['id' => 'aseguradora_id']);
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
