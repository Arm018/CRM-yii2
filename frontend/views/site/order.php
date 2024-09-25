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

        <?php $form = ActiveForm::begin(['action' => ['site/submit-order']]); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'product_name')->dropDownList([
            'Apples' => 'Apples',
            'Oranges' => 'Oranges',
            'Tangerines' => 'Tangerines',
        ], ['prompt' => 'Select Product']) ?>

        <div class="form-group">
            <?= Html::submitButton('Submit Order', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
