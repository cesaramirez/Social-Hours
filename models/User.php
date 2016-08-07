<?php

namespace app\models;

use yii\web\IdentityInterface;
use yii\base\Security;
use yii\db\ActiveRecord;
use app\models\Member;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $role_id
 * @property string $email
 * @property integer $active
 * @property integer $reset_password
 * @property integer $member_id
 *
 * @property Member $member
 * @property Role $role
 */
class User extends ActiveRecord Implements IdentityInterface
{

    const SCENARIO_UPDATE = 'update';
    const SCENARIO_CREATE = 'create';

    public $member_name;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'role_id',
              'active', 'reset_password'], 'required','on' => self::SCENARIO_CREATE],
            [['username', 'role_id',
              'active', 'reset_password'], 'required','on' => self::SCENARIO_UPDATE],
            [['role_id', 'active', 'reset_password'], 'integer'],
            [['username'], 'string', 'max' => 45],
            [['password'], 'string', 'max' => 500],
            [['email'], 'string', 'max' => 200],
            [['email'],'email'],
            [['member_id'], 'exist', 'skipOnError' => true,
              'targetClass' => Member::className(),
              'targetAttribute' => ['member_id' => 'id']],
            [['role_id'], 'exist', 'skipOnError' => true,
              'targetClass' => Role::className(),
              'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Nombre de Usuario',
            'password' => 'Contraseña',
            'role_id' => 'Rol',
            'email' => 'Correo Electronico',
            'active' => 'Activo',
            'reset_password' => 'Reiniciar Contraseña',
            'member_id' => 'Miembro',
        ];
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getMember()
    {
       return $this->hasOne(Member::className(), ['id' => 'member_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }

    /**
     * Finds an identity by the given ID.
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|integer an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return boolean whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public static function findByUsername($_user)
    {
        return self::findOne(['username'=>$_user,'active'=>true]);
    }

    public function validatePassword($password)
    {
        $passwordHelper = new Security();
        return $passwordHelper->validatePassword($password, $this->password);
    }

    public function getFullName()
    {
        return isset($this->member) ?
                $this->member->name." ".$this->member->last_name :
                $this->username;
    }
}
