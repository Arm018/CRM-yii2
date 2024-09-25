<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = $model->order_name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <table class="table table-bordered">
        <tr>
            <th><?= Html::encode($model->getAttributeLabel('username')) ?></th>
            <td><?= Html::encode($model->username) ?></td>
        </tr>
        <tr>
            <th><?= Html::encode($model->getAttributeLabel('order_name')) ?></th>
            <td><?= Html::encode($model->order_name) ?></td>
        </tr>
        <tr>
            <th><?= Html::encode($model->getAttributeLabel('product_name')) ?></th>
            <td><?= Html::encode($model->product_name) ?></td>
        </tr>
        <tr>
            <th><?= Html::encode($model->getAttributeLabel('phone')) ?></th>
            <td><?= Html::encode($model->phone) ?></td>
        </tr>
        <tr>
            <th><?= Html::encode($model->getAttributeLabel('created_at')) ?></th>
            <td><?= Html::encode($model->created_at) ?></td>
        </tr>
        <tr>
            <th><?= Html::encode($model->getAttributeLabel('status')) ?></th>
            <td><?= Html::encode($model->status) ?></td>
        </tr>
        <tr>
            <th><?= Html::encode($model->getAttributeLabel('comment')) ?></th>
            <td><?= Html::encode($model->comment) ?></td>
        </tr>
        <tr>
            <th><?= Html::encode($model->getAttributeLabel('price')) ?></th>
            <td><?= Html::encode($model->price) ?></td>
        </tr>
    </table>

</div>
