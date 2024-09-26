<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrderHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Histories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-history-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'order_id',
            'attribute',
            'old_value:ntext',
            'new_value:ntext',
            'updated_by',
            'updated_at',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
