<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $name
 * @property boolean $active
 * @property string $ISO
 *
 * @property Member[] $members
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'ISO'], 'required'],
            [['active'], 'boolean'],
            [['name'], 'string', 'max' => 25],
            [['ISO'], 'string', 'max' => 5],
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
            'active' => 'Activo',
            'ISO' => 'ISO',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembers()
    {
        return $this->hasMany(Member::className(), ['country_id' => 'id']);
    }

    public static function get($param)
    {
    $active = empty($param) ? true : $param;
    $countries = ArrayHelper::map(self::find()->where(['active'=>$active])
                                              ->all(),'id','name');

    return empty($countries) ? [] : $countries;
    }
}
