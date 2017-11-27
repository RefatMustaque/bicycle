<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bicycle_brand".
 *
 * @property integer $id
 * @property string $bicycle_brand
 * @property string $description
 */
class BicycleBrand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bicycle_brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['bicycle_brand', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bicycle_brand' => 'Bicycle Brand',
            'description' => 'Description',
        ];
    }
}
