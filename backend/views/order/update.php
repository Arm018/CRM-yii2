<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Update Order: ' . $model->order_name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="order-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'order_name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'status')->dropDownList([
            \common\models\Order::STATUS_PENDING => 'Pending',
            \common\models\Order::STATUS_RECEIVED => 'Received',
            \common\models\Order::STATUS_CANCELED => 'Canceled',
            \common\models\Order::STATUS_DEFECT => 'Defect',
        ]) ?>
        <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'price')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
