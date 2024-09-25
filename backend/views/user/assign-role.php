<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $currentRole string */
/* @var $roles array */

$this->title = 'Assign Role';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="assign-role">
    <h1><?= Html::encode($this->title) ?></h1>

    <h2>Assign Role to: <?= Html::encode($user->email) ?></h2>

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <label for="role">Select Role</label>
        <select name="role" class="form-control" id="role">
            <?php foreach ($roles as $role): ?>
                <option value="<?= $role->name ?>" <?= $role->name === $currentRole ? 'selected' : '' ?>>
                    <?= $role->name ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Assign Role', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
