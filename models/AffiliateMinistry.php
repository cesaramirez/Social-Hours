<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "affiliate_ministry".
 *
 * @property integer $id
 * @property integer $ministry_id
 * @property integer $affiliate_id
 *
 * @property Ministry $ministry
 * @property Affiliate $affiliate
 */
class AffiliateMinistry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'affiliate_ministry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ministry_id', 'affiliate_id'], 'required'],
            [['ministry_id', 'affiliate_id'], 'integer'],
            [['ministry_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ministry::className(), 'targetAttribute' => ['ministry_id' => 'id']],
            [['affiliate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Affiliate::className(), 'targetAttribute' => ['affiliate_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ministry_id' => 'Ministry ID',
            'affiliate_id' => 'Affiliate ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMinistry()
    {
        return $this->hasOne(Ministry::className(), ['id' => 'ministry_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAffiliate()
    {
        return $this->hasOne(Affiliate::className(), ['id' => 'affiliate_id']);
    }
}
