<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<style>
    #main {
        padding: 0;
        margin: 0;
        background-image: url("../images/banner.png");
        background-size: cover;
        background-repeat: no-repeat;
        width: 100%;
        height: 100%;
    }
    .btn{
        position: absolute; top: 75%; left: 50%; transform: translate(-50%, -50%);
    }
    .navbar-expand-md{
        background-color: #000000;
    }
</style>
<body class="d-flex flex-column h-100 w-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="../images/logolibrary.png" style="width: 140px; height: 40px">',
        'brandUrl' => ['site/index'],
        'options' => ['class' => 'navbar-expand-md navbar-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'Каталог книг', 'url' => ['/site/about']],
            ['label' => 'Онлайн продление книги', 'url' => ['/site/contact']],
            ['label' => 'Регистрация', 'url' => ['/site/register'], 'visible'=> Yii::$app->user->isGuest],
            Yii::$app->user->isGuest
                ? ['label' => 'Войти', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                . Html::beginForm(['/site/logout'])
                . Html::submitButton(
                    'Выход (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'nav-link btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" role="main">
    <div class="container d-flex justify-content-center align-items-center">
        <a class="btn btn-light fs-5 fw-bold" style="color: #583c2d; width: 15rem">Каталог книг</a>
    </div>
    <div class="content" style="margin-top: 30rem">
        <?= $content ?>
        <footer class="text-white text-center text-lg-start" style="background-color: #583c2d">
            <div class="container p-4">
                <div class="d-flex flex-row">
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase fw-bold" style="font-family: Century Gothic;">Контакты</h5>
                        <p><b>Адрес:</b> г.Москва, улица Ленина, 25б</p>
                        <p><b>Телефон:</b> (1513) 77-77-77</p>
                        <p><b>Email:</b> bookland@mail.ru</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase fw-bold" style="font-family: Century Gothic;">Режим работы</h5>
                        <div class="d-flex flex-row justify-content-between">
                            <p>Понедельник:</p>
                            <p>8:00 - 18:00</p>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <p>Вторник:</p>
                            <p>8:00 - 18:00</p>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <p>Среда:</p>
                            <p>8:00 - 18:00</p>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <p>Четверг:</p>
                            <p>8:00 - 18:00</p>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <p>Пятница:</p>
                            <p>8:00 - 18:00</p>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <p>Суббота:</p>
                            <p>8:00 - 16:00</p>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <p>Воскресенье:</p>
                            <p>Выходной</p>
                        </div>
                    </div>
                    <img src="images/logolibrary.png" style="width: 20rem; height: 100%;">
                </div>
            </div>
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2023 Copyright:
                <a class="text-white" href="#">BookLand</a>
            </div>
        </footer>
    </div>
</main>






<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
