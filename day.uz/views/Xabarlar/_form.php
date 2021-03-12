<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Xabarlar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="xabarlar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bolim_id')->dropdownList(ArrayHelper::map(\app\models\Bolimlar::find()->all(), 'id', 'bolim_nomi_uz'), ['prompt' => "Bo'limni tanlang"]) ?>

    <?= $form->field($model, 'rasm')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sarlavha_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sarlavha_uzc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sarlavha_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sarlavha_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'matn_uz')->widget(CKEditor::className(),[
                                                                    'editorOptions' => [
                                                                        'preset' => 'basic',
                                                                        'inline' => false,
                                                                    ],
                                                                ]);
    ?>

    <?= $form->field($model, 'matn_uzc')->widget(CKEditor::className(),[
                                                                    'editorOptions' => [
                                                                        'preset' => 'basic',
                                                                        'inline' => false,
                                                                    ],
                                                                ]);
    ?>

    <?= $form->field($model, 'matn_en')->widget(CKEditor::className(),[
                                                                    'editorOptions' => [
                                                                        'preset' => 'basic',
                                                                        'inline' => false,
                                                                    ],
                                                                ]);
    ?>

    <?= $form->field($model, 'matn_ru')->widget(CKEditor::className(),[
                                                                    'editorOptions' => [
                                                                        'preset' => 'basic',
                                                                        'inline' => false,
                                                                    ],
                                                                ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
