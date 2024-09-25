<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $username
 * @property string $order_name
 * @property string $product_name
 * @property string $phone
 * @property string $status
 * @property string|null $comment
 * @property float $price
 * @property string $created_at
 */
class Order extends \yii\db\ActiveRecord
{
    const STATUS_PENDING = 'pending';
    const STATUS_RECEIVED = 'received';
    const STATUS_CANCELED = 'canceled';
    const STATUS_DEFECT = 'defect';

    public $productPrices = [
        'Apples' => 1.00,
        'Oranges' => 1.50,
        'Tangerines' => 2.00
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'order_name', 'product_name', 'phone', 'price'], 'required'],
            [['comment'], 'string'],
            [['price'], 'number'],
            [['created_at'], 'safe'],
            [['username', 'order_name', 'product_name', 'status'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
            ['status', 'in', 'range' => [self::STATUS_PENDING, self::STATUS_RECEIVED, self::STATUS_CANCELED, self::STATUS_DEFECT]],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'order_name' => 'Order Name',
            'product_name' => 'Product Name',
            'phone' => 'Phone',
            'status' => 'Status',
            'comment' => 'Comment',
            'price' => 'Price',
            'created_at' => 'Created At',
        ];
    }
}
