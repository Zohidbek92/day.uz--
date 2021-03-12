<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */
?>
<div class="site-register">
    <h2>Ro'yxatdan o'tish</h2>
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'firstname') ?>
        <?= $form->field($model, 'lastname') ?>
        <?= $form->field($model, 'gender')->radioList(['erkak' => "Erkak", 'ayol' => "Ayol"]) ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'password_repeat')->passwordInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton('Yuborish', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-register -->
