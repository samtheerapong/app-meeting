<?php

namespace backend\modules\meeting\models;

use Yii;

/**
 * This is the model class for table "equipment".
 *
 * @property int $id
 * @property string $equipment อุปกรณ์
 * @property string $description รายละเอียด
 * @property string|null $photo รูปภาพ
 *
 * @property Meeting[] $meetings
 * @property Uses[] $uses
 */
class Equipment extends \yii\db\ActiveRecord
{

    public $equipment_img;

    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equipment', 'description'], 'required'],
            [['description'], 'string'],
            [['equipment', 'photo'], 'string', 'max' => 100],
            [['equipment_img'], 'file', 'skipOnEmpty'=> true, 'on' => 'update', 'extensions' => 'jpg,png,gif'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'equipment' => 'อุปกรณ์',
            'description' => 'รายละเอียด',
            'photo' => 'รูปภาพ',
            'equipment_img' => 'รูปภาพ',
            
        ];
    }

    /**
     * Gets query for [[Meetings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeetings()
    {
        return $this->hasMany(Meeting::className(), ['id' => 'meeting_id'])->viaTable('uses', ['equipment_id' => 'id']);
    }

    /**
     * Gets query for [[Uses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUses()
    {
        return $this->hasMany(Uses::className(), ['equipment_id' => 'id']);
    }
}
