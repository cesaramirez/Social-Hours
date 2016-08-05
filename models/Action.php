<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "action".
 *
 * @property integer $id
 * @property string $name
 * @property string $friendly_name
 * @property string $description
 * @property integer $controller_id
 *
 * @property Controller $controller
 */
class Action extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'action';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'friendly_name', 'controller_id'], 'required'],
            [['controller_id'], 'integer'],
            [['name', 'friendly_name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 500],
            [['controller_id'], 'exist', 'skipOnError' => true, 'targetClass' => Controler::className(), 'targetAttribute' => ['controller_id' => 'id']],
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
            'controller_id' => 'Controller ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getController()
    {
        return $this->hasOne(Controler::className(), ['id' => 'controller_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\ActionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\ActionQuery(get_called_class());
    }

    public static function findByController($controller,$action)
    {
        $q = self::find()
             ->joinWith('controller')
             ->where('controller.name=:nameController')
             ->andWhere('action.name=:nameAction')
             ->params([
                     ':nameController' => $controller,
                     ':nameAction' => $action])
             ->one();

        return $q;
    }
}
