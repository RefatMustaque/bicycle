<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bicycle_info".
 *
 * @property integer $id
 * @property string $bicycle_model
 * @property string $brand
 * @property integer $price
 * @property integer $quantity
 */
class BicycleInfo extends \yii\db\ActiveRecord
{
    public $imageFile;
    public $count;
    public $imageName;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bicycle_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price', 'quantity'], 'integer'],
            [['bicycle_model', 'image_url' ,'brand', 'description', 'type', 'type_description'], 'string', 'max' => 255],
            ['bicycle_model', 'unique'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bicycle_model' => 'Bicycle Model',
            'brand' => 'Brand',
            'description' => 'Description',
            'type' => 'Type',
            'type_description' => 'Type Description',
            'price' => 'Price',
            'quantity' => 'Quantity',
            'image_url' => 'Image Url',
            'imageFile' => 'Image File'
        ];
    }

    // file upload function for uploading image file for bicycle-info
    public function upload()
    {
        if ($this->validate()) {
            $this->count = 1;
            // keeping read only imageFile->baseName to imageName to modify name if already exist.
            $this->imageName =  $this->imageFile->baseName;
            // checking if the file name exist or not 
            while ( file_exists (Yii::getAlias("@app") . '//uploads/' . $this->imageName . '.' . $this->imageFile->extension) ){
                // if exist adding integer variable count as suffix
                $this->imageName =  $this->imageName . $this->count; 
                $this->count++;
             }
             // saving the image name with the extension in the database
            $this->image_url = $this->imageName . '.' . $this->imageFile->extension;
            $this->save();
            //  saving file in the server
            $this->imageFile->saveAs(Yii::getAlias("@app") . '//uploads/' . $this->imageName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }

}
