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
 * @property string $module_id
 *
 * @property Action[] $actions
 * @property Module[] $modules
 */
class Controler extends \yii\db\ActiveRecord
{

    public $action;
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
            [['name', 'friendly_name', 'module_id'], 'required'],
            [['module_id'], 'integer'],
            [['name', 'friendly_name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 500],
            [['module_id'], 'exist', 'skipOnError' => true, 
             'targetClass' => Module::className(), 'targetAttribute' => 
                                                    ['module_id' => 'id']], 
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre',
            'friendly_name' => 'Nombre Amigable',
            'description' => 'Descripción',
            'module_id' => 'module_id'
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
    public function getModule()
    {
        return $this->hasOne(Module::className(), ['id' => 'module_id']);
    }
}
