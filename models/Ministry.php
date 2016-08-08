<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ministry".
 *
 * @property integer $id
 * @property string $name
 * @property boolean $active
 *
 * @property AffiliateMinistry[] $affiliateMinistries
 * @property PositionMinistry[] $positionMinistries
 */
class Ministry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ministry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['active'], 'boolean'],
            [['name'], 'string', 'max' => 45],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAffiliateMinistries()
    {
        return $this->hasMany(AffiliateMinistry::className(), ['ministry_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPositionMinistries()
    {
        return $this->hasMany(PositionMinistry::className(), ['ministry_id' => 'id']);
    }
}
