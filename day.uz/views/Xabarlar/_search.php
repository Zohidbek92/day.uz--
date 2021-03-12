<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\XabarlarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="xabarlar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'bolim_id') ?>

    <?= $form->field($model, 'rasm') ?>

    <?= $form->field($model, 'sarlavha_uz') ?>

    <?= $form->field($model, 'sarlavha_uzc') ?>

    <?php // echo $form->field($model, 'sarlavha_en') ?>

    <?php // echo $form->field($model, 'sarlavha_ru') ?>

    <?php // echo $form->field($model, 'matn_uz') ?>

    <?php // echo $form->field($model, 'matn_uzc') ?>

    <?php // echo $form->field($model, 'matn_en') ?>

    <?php // echo $form->field($model, 'matn_ru') ?>

    <?php // echo $form->field($model, 'sana') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
