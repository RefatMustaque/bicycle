<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "type".
 *
 * @property integer $id
 * @property string $type
 * @property string $type_description
 */
class Type extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'type_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'type_description' => 'Type Description',
        ];
    }
}
