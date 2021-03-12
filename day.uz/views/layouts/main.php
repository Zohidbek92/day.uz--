<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\twig\ViewRenderer;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->params['siteName'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => Yii::t('app', 'barcha'), 'url' => ['/site/index']],
            ['label' => Yii::t('app', 'uzbekistan'), 'url' => ['/site/uzbekistan']],
            ['label' => Yii::t('app', 'dunyo'), 'url' => ['/site/dunyo']],
            ['label' => Yii::t('app', 'sport'), 'url' => ['/site/sport']],
            [
                'label' => Yii::t('app', 'tillar'),
                'items' => [
                    ['label' => "O'zbekcha", 'url' => ['/site/ozgar', 'til'=>'uz']],
                    ['label' => "Узбекча", 'url' => ['/site/ozgar', 'til'=>'uzc']],
                    ['label' => "English", 'url' => ['/site/ozgar', 'til'=>'en']],
                    ['label' => "Руский", 'url' => ['/site/ozgar', 'til'=>'ru']],
                ],
            ],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?php
            // foreach (Yii::$app->params['tillar'] as $key => $value) {
            //     echo "<li><a href='".\yii\helpers\Url::to(['site/ozgar', 'til'=>$key])."'>".$value."</a></li>";
            // }
        ?>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
