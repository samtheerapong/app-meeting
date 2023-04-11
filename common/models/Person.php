<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property int $user_id
 * @property string $firstname ชื่อ
 * @property string $lastname นามสกุล
 * @property string|null $photo รูปภาพ
 * @property string|null $address ที่อยู่
 * @property string|null $tel เบอร์โทร
 * @property int $department_id ฝ่าย
 *
 * @property Department $department
 * @property Meeting[] $meetings
 * @property User $user
 */
class Person extends \yii\db\ActiveRecord
{

    public $person_img; 

    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'department_id'], 'required'],
            [['address'], 'string'],
            [['department_id'], 'integer'],
            [['firstname', 'lastname', 'photo'], 'string', 'max' => 100],
            [['tel'], 'string', 'max' => 45],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['person_img'], 'file', 'skipOnEmpty'=> true, 'on' => 'update', 'extensions' => 'jpg,png,gif'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'firstname' => 'ชื่อ',
            'lastname' => 'นามสกุล',
            'photo' => 'รูปภาพ',
            'address' => 'ที่อยู่',
            'tel' => 'เบอร์โทร',
            'department_id' => 'ฝ่าย',
            'username'=> 'USERNAME',
        ];
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    /**
     * Gets query for [[Meetings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeetings()
    {
        return $this->hasMany(Meeting::className(), ['user_id' => 'user_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
