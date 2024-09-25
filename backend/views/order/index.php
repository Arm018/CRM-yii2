<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            'order_name',
            'product_name',
            'phone',
            'created_at',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->status == \common\models\Order::STATUS_PENDING ? 'Pending' :
                        ($model->status == \common\models\Order::STATUS_RECEIVED ? 'Received' :
                            ($model->status == \common\models\Order::STATUS_CANCELED ? 'Canceled' : 'Defect'));
                },
            ],
            'comment',
            'price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
