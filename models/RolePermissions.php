<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "role_permissions".
 *
 * @property integer $id
 * @property integer $role_id
 * @property integer $action_id
 * @property integer $permission
 */
class RolePermissions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role_permissions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'action_id', 'permission'], 'required'],
            [['role_id', 'action_id', 'permission'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'action_id' => 'Action ID',
            'permission' => 'Permission',
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\query\RolePermissionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\RolePermissionsQuery(get_called_class());
    }
}
