<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "affiliate".
 *
 * @property integer $id
 * @property string $name
 * @property boolean $allows_ministry
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
            [['allows_ministry', 'active'], 'boolean'],
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
            'allows_ministry' => 'Permite Ministerios',
            'active' => 'Activo',
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
