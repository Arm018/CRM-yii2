<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Order Successful';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-success">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-success">
        <strong>Success!</strong> Your order has been submitted successfully.
    </div>

    <p>
        Thank you for your order, <?= Html::encode(Yii::$app->request->post('Order')) ?>.
        We will process your order shortly.
    </p>

    <p>
        If you have any questions, please <a href="<?= \yii\helpers\Url::to(['/site/contact']) ?>">contact us</a>.
    </p>

    <p>
        <?= Html::a('Return to Home', ['/site/index'], ['class' => 'btn btn-primary']) ?>
    </p>
</div>
