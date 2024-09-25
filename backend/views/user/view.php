<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->email;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Assign Role', ['assign-role', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    </p>
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
            <th><?= Html::encode($model->getAttributeLabel('id')) ?></th>
            <td><?= Html::encode($model->id) ?></td>
        </tr>
        <tr>
            <th><?= Html::encode($model->getAttributeLabel('email')) ?></th>
            <td><?= Html::encode($model->email) ?></td>
        </tr>
        <tr>
            <th><?= Html::encode($model->getAttributeLabel('password_hash')) ?></th>
            <td><?= Html::encode($model->password_hash) ?></td>
        </tr>
        <tr>
            <th><?= Html::encode($model->getAttributeLabel('status')) ?></th>
            <td><?= Html::encode($model->status === 10 ? 'Active' : 'Inactive') ?></td>
        </tr>
    </table>

</div>
