<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "controller".
 *
 * @property integer $id
 * @property string $name
 * @property string $friendly_name
 * @property string $description
 *
 * @property Action[] $actions
 */
class Controller extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'controller';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'friendly_name'], 'required'],
            [['name', 'friendly_name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 500],
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
            'friendly_name' => 'Friendly Name',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActions()
    {
        return $this->hasMany(Action::className(), ['controller_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\ControllerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\ControllerQuery(get_called_class());
    }
}
