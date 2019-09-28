<?php

namespace app\models;

use Yii;



/**
 * This is the model class for table "usuarios".
 *
 * @property string $id
 * @property string $personas_id
 * @property string $email
 * @property string $username
 * @property string $clave
 *
 * @property Consultas[] $consultas
 * @property Personas $personas
 */
class Usuarios extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    const ROLE_ADMIN = 10;
    const ROLE_USUARIO = 0;
    
    public $accessToken;

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
            [['personas_id', 'email', 'username', 'password','authKey','role'], 'required'],
            [['personas_id','role'], 'integer'],
            [['password','authKey'], 'string'],
            [['email'], 'string', 'max' => 30],
            [['username'], 'string', 'max' => 15],
            [['authKey'], 'string', 'max' => 50],
            // ['role', 'default', 'value' => 10],
            ['role', 'in', 'range' => [self::ROLE_ADMIN,self::ROLE_USUARIO]],
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
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'role' => Yii::t('app', 'Role'),
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

    public static function findIdentity($id){
		return static::findOne($id);
	}
 
	public static function findIdentityByAccessToken($token, $type = null){
		throw new NotSupportedException();//I don't implement this method because I don't have any access token column in my database
	}
 
	public function getId(){
		return $this->id;
    }
 
	public function getAuthKey(){
		return $this->authKey;//Here I return a value of my authKey column
	}
 
	public function validateAuthKey($authKey){
		return $this->authKey === $authKey;
	}
	public static function findByUsername($username){
		return self::findOne(['username'=>$username]);
	}
 
	public function validatePassword($password){
        return Yii::$app->security->validatePassword($password, $this->password);
    }
    public static function roleInArray($arr_role){
        return in_array(Yii::$app->user->identity->role, $arr_role);
    }
    // public static function isActive(){
    //     return Yii::$app->user->identity->status == self::STATUS_ACTIVE;
    // }
}
