<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $last_name
 * @property string $document_number
 * @property string $birthdate
 * @property integer $country_id
 * @property integer $status_id
 * @property string $email
 * @property string $baptism_date
 * @property string $address
 * @property integer $affiliate_id
 * @property string $inscription_date
 * @property string $created_at
 * @property string $updated_at
 * @property string $active
 *
 * @property Country $country
 * @property Status $status
 * @property User[] $users
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'last_name', 'document_number', 'birthdate', 'country_id', 'status_id', 'email', 'baptism_date', 'address', 'affiliate_id'], 'required'],
            [['birthdate', 'baptism_date', 'created_at', 'updated_at'], 'safe'],
            [['country_id', 'status_id', 'affiliate_id'], 'integer'],
            [['code'], 'string', 'max' => 15],
            [['name', 'last_name'], 'string', 'max' => 50],
            [['document_number'], 'string', 'max' => 25],
            [['email', 'active'], 'string', 'max' => 150],
            [['address'], 'string', 'max' => 250],
            [['inscription_date'], 'string', 'max' => 45],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Nombres',
            'last_name' => 'Apellidos',
            'document_number' => 'No. de Documento',
            'birthdate' => 'Fecha de Nacimiento',
            'country_id' => 'Country ID',
            'status_id' => 'Status ID',
            'email' => 'e-Mail',
            'baptism_date' => 'Fecha de Bautizo',
            'address' => 'Direccion',
            'affiliate_id' => 'Affiliate ID',
            'inscription_date' => 'Fecha de Inscripción',
            'created_at' => 'Creado el',
            'updated_at' => 'Actualizado el',
            'active' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['member_id' => 'id']);
    }
}
