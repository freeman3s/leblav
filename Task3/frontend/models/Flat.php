<?php

namespace app\models;
use yii\web\UploadedFile;

use Yii;

/**
 * This is the model class for table "flat".
 *
 * @property integer $id
 * @property string $title
 * @property string $photo
 * @property string $price
 * @property string $address
 * @property string $description
 */
class Flat extends \yii\db\ActiveRecord
{
    public $upload_image;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'photo', 'price', 'address', 'description'], 'required'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['title', 'photo', 'address'], 'string', 'max' => 128],
            [['upload_image'], 'image','extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 4, 'minWidth' => 100, 'maxWidth' => 800, 'minHeight' => 100, 'maxHeight'=>600,'skipOnEmpty' => true, 'on' => 'update'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'photo' => 'Photo',
            'price' => 'Price',
            'address' => 'Address',
            'description' => 'Description',
        ];
    }

    public function uploadFile() {
        $image = UploadedFile::getInstance($this, 'upload_image');

        if (empty($image)) {
            return false;
        }

        $this->photo = time(). '.' . $image->extension;

        return $image;
    }

    public function getUploadedFile() {
        $pic = isset($this->photo) ? $this->photo: 'default.png';
        return Yii::$app->params['fileUploadUrl'] . $pic;
    }
}
