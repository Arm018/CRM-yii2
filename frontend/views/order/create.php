<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'Submit Order';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-order">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="order-form">

        <?php $form = ActiveForm::begin(['action' => ['order/create']]); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'order_name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'product_name')->dropDownList([
            'Apples' => 'Apples',
            'Oranges' => 'Oranges',
            'Tangerines' => 'Tangerines',
        ], [
            'prompt' => 'Select Product',
            'id' => 'product-select'
        ]) ?>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" id="price" class="form-control" value="0" readonly>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Submit Order', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <!-- Display errors -->
        <?php if ($model->hasErrors()): ?>
            <div class="alert alert-danger">
                <?= Html::errorSummary($model); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
$script = <<< JS
$('#product-select').change(function() {
    var product = $(this).val();
    var price = 0;
    switch (product) {
        case 'Apples':
            price = 1.00;
            break;
        case 'Oranges':
            price = 1.50;
            break;
        case 'Tangerines':
            price = 2.00;
            break;
    }
    $('#price').val(price.toFixed(2)); // Update price input field
});
JS;
$this->registerJs($script);
?>
