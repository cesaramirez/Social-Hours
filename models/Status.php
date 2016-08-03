<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property integer $id
 * @property string $key
 * @property string $name_status
 * @property boolean $active
 */
class Status extends \yii\db\ActiveRecord
{

    CONST ACT = "act";
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'name_status'], 'required'],
            [['active'], 'boolean'],
            [['key'], 'string', 'max' => 25],
            [['name_status'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'name_status' => 'Name Status',
            'active' => 'Active',
        ];
    }

    public static function get($key)
    {
        return empty($key) ? [] : self::find()->where(['key'=>$key])->all();
    }
}
