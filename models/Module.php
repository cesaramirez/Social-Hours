<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "module".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property boolean $active
 *
 * @property Controller[] $controllers
 */
class Module extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'module';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['active'], 'boolean'],
            [['code'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getControllers()
    {
        return $this->hasMany(Controller::className(), ['module_id' => 'id']);
    }
}
