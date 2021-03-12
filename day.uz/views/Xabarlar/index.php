<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\XabarlarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Xabarlars');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xabarlar-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Xabarlar'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
        $url = Url::to(['xabarlar/index']);
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'bolim_id',
                    'label' => "Bo'limlar",
                    'value' => function($d)
                    {
                        return $d->bolimlar->bolim_nomi_uz;
                    }

                ],
            // 'rasm',
                [
                    'attribute' => 'rasm',
                    'label' => "Rasm",
                    'format' => 'html',
                    'value' => function($data)
                    {
                        //return Html::img(Yii::getAlias('@web').'/rasmlar/'.$data->rasm,['width' => 100]);
                        return '<img src="rasmlar/'.$data->rasm.'"" width="150px">';
                    }
                ],
            'sarlavha_uz',
            // 'sarlavha_uzc',
            // 'sarlavha_en',
            // 'sarlavha_ru',
            //'matn_uz:ntext',
            //'matn_uzc:ntext',
            //'matn_en:ntext',
            //'matn_ru:ntext',
            //'sana',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
