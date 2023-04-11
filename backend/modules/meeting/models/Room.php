<?php

namespace backend\modules\meeting\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "room".
 *
 * @property int $id
 * @property string $name ชื่อห้องประชุม
 * @property string $description รายละเอียด
 * @property string|null $photo รูปภาพ
 * @property string|null $color สีประจำห้อง
 *
 * @property Meeting[] $meetings
 */
class Room extends \yii\db\ActiveRecord
{
    public $room_img;
    public $upload_folder = 'uploads/img';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['description'], 'string'],
            [['name', 'photo'], 'string', 'max' => 100],
            [['color'], 'string', 'max' => 7],
            [['room_img'], 'file', 'skipOnEmpty'=> true, 'on' => 'update', 'extensions' => 'jpg,png,gif'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อห้องประชุม',
            'description' => 'รายละเอียด',
            'photo' => 'รูปภาพ',
            'color' => 'สีประจำห้อง',
            'room_img' => 'รูปภาพ',
        ];
    }

    /**
     * Gets query for [[Meetings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeetings()
    {
        return $this->hasMany(Meeting::class, ['room_id' => 'id']);
    }

    /** Uploads phot **/
    public function upload($model, $attribute) {
        $photo = UploadedFile::getInstance($model, $attribute);
        $path = $this->getUploadPath();
        if ($this->validate() && $photo !== null) {

            $fileName = md5($photo->baseName . time()) . '.' . $photo->extension;
            if ($photo->saveAs($path . $fileName)) {
                return $fileName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function getUploadPath() {
        return Yii::getAlias('@webroot') . '/' . $this->upload_folder . '/';
    }

    public function getUploadUrl() {
        return Yii::getAlias('@web') . '/' . $this->upload_folder . '/';
    }

    public function getPhotoViewer() {
        return empty($this->photo) ? Yii::getAlias('@web') . '/uploads/img/nopicture.jpg' : $this->getUploadUrl() . $this->photo;
    }
}
