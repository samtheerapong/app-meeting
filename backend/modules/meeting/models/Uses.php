<?php

namespace backend\modules\meeting\models;

use Yii;

/**
 * This is the model class for table "uses".
 *
 * @property int $meeting_id การจอง
 * @property int $equipment_id อุปกรณ์
 *
 * @property Equipment $equipment
 * @property Meeting $meeting
 */
class Uses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meeting_id', 'equipment_id'], 'required'],
            [['meeting_id', 'equipment_id'], 'integer'],
            [['meeting_id', 'equipment_id'], 'unique', 'targetAttribute' => ['meeting_id', 'equipment_id']],
            [['equipment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Equipment::className(), 'targetAttribute' => ['equipment_id' => 'id']],
            [['meeting_id'], 'exist', 'skipOnError' => true, 'targetClass' => Meeting::className(), 'targetAttribute' => ['meeting_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'meeting_id' => 'การจอง',
            'equipment_id' => 'อุปกรณ์ที่ใช้',
        ];
    }

    /**
     * Gets query for [[Equipment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasOne(Equipment::className(), ['id' => 'equipment_id']);
    }

    /**
     * Gets query for [[Meeting]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeeting()
    {
        return $this->hasOne(Meeting::className(), ['id' => 'meeting_id']);
    }
}
