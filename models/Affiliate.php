<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "affiliate".
 *
 * @property integer $id
 * @property string $name
 * @property boolean $allows ministry
 * @property boolean $active
 *
 * @property AffiliateMinistry[] $affiliateMinistries
 */
class Affiliate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'affiliate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['allows ministry', 'active'], 'boolean'],
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
            'name' => 'Name',
            'allows ministry' => 'Allows Ministry',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAffiliateMinistries()
    {
        return $this->hasMany(AffiliateMinistry::className(), ['affiliate_id' => 'id']);
    }
}
