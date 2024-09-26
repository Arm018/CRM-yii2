<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_history".
 *
 * @property int $id
 * @property int $order_id
 * @property string $attribute
 * @property string $old_value
 * @property string $new_value
 * @property string $updated_by
 * @property string $updated_at
 */
class OrderHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'attribute', 'old_value', 'new_value', 'updated_by'], 'required'],
            [['order_id'], 'integer'],
            [['old_value', 'new_value'], 'string'],
            [['updated_at'], 'safe'],
            [['attribute', 'updated_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'attribute' => 'Attribute',
            'old_value' => 'Old Value',
            'new_value' => 'New Value',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
}
