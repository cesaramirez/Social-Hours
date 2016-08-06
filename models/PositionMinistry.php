<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "position_ministry".
 *
 * @property integer $id
 * @property integer $ministry_id
 * @property integer $position_id
 * @property integer $active
 * @property string $description
 *
 * @property Ministry $ministry
 * @property Position $position
 */
class PositionMinistry extends \yii\db\ActiveRecord
{
    public $position_name;
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
            [['ministry_id', 'active','position_name'], 'required'],
            [['ministry_id', 'position_id'], 'integer'],
            [['description'], 'string', 'max' => 250],
            [['position_name'], 'required'],
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
            'ministry_id' => 'ID de Ministerio',
            'position_id' => 'ID de Cargo',
            'active' => 'Activo',
            'description' => 'Descripcion',
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
