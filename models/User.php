<?php

namespace app\models;

use Yii;
use app\models\query\UserQuery;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $name
 * @property string $last_name
 * @property string $username
 * @property string $password
 * @property integer $role_id
 * @property string $email
 * @property integer $active
 * @property integer $reset_password
 *
 * @property Role $role
 */
class User extends \yii\db\ActiveRecord
{
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
            [['name', 'username', 'password', 'role_id', 'email', 'active', 'reset_password'], 'required'],
            [['role_id', 'active', 'reset_password'], 'integer'],
            [['name', 'last_name'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 45],
            [['password'], 'string', 'max' => 500],
            [['email'], 'string', 'max' => 200],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'last_name' => 'Last Name',
            'username' => 'Username',
            'password' => 'Password',
            'role_id' => 'Role ID',
            'email' => 'Email',
            'active' => 'Active',
            'reset_password' => 'Reset Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    public static function findByUsername($username)
    {
        foreach (self::find()->all() as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }
        return null;
    }
}
