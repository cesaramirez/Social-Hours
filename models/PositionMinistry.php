<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "position_ministry".
 *
 * @property integer $id
 * @property integer $ministry_id
 * @property integer $position_id
 * @property integer $member_id
 *
 * @property Ministry $ministry
 * @property Position $position
 */
class PositionMinistry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'position_ministry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ministry_id', 'position_id', 'member_id'], 'required'],
            [['ministry_id', 'position_id', 'member_id'], 'integer'],
            [['ministry_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ministry::className(), 'targetAttribute' => ['ministry_id' => 'id']],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position_id' => 'id']],
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
            'position_id' => 'Position ID',
            'member_id' => 'Member ID',
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
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
    }
}
