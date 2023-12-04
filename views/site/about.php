<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .card {
        position: relative;
        width: 11rem;
        height: 17rem;
        margin: 0 auto;
        border: none;
        border-radius: 0;
        background: #745544;
        box-shadow: 0 15px 60px rgba(0, 0, 0, 0.5);

    .face {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;

    &.face1 {
         box-sizing: border-box;
         padding: 20px;

    h2 {
        margin: 0;
        padding: 0;
    }
    }

    &.face2 {
         transition: 0.5s;

    h2 {
        margin: 0;
        padding: 0;
        font-size: 10em;
        color: #fff;
        transition: 0.5s;
        text-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        z-index: 10;
    }
    }
    }
    }

    .card:hover .face.face2 {
        height: 60px;

    h2 {
        font-size: 2em;
    }
    }
    }
    }
</style>
<div class="content d-flex flex-column justify-content-center align-items-center" style="background-color: #eee4e4">
    <div class="d-flex flex-column w-75">
        <h1 class="text-center mt-5" style="color: #745544;">Каталог книг</h1>
        <h4>Новые</h4>
        <hr>
        <div class="mt-4 d-flex flex-row">
            <?php foreach ($books as $book):?>
                <div class="card mb-5 ms-4">
                    <div class="face face1">
                        <div class="content">
                            <span class="stars"></span>
                            <p class="text-light text-center fw-bold"><?= $book->name ?></p>
                            <p class="text-light text-center"><?= $book->author->name ?> <?= $book->author->surname ?></p>
                        </div>
                    </div>
                    <div class="face face2" style="background-image: url('images/<?php echo $book['image']?>'); background-size: cover; "></div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
    <div class="d-flex flex-column w-75">
    <?php foreach ($categories as $category): ?>
        <h4><?= $category->name ?></h4>
        <hr>
        <div class="mt-4 d-flex flex-row">
            <?php foreach ($category->books as $book): ?>
                <div class="card mb-5 ms-4">
                    <div class="face face1">
                        <div class="content">
                            <span class="stars"></span>
                            <p class="text-light text-center fw-bold"><?= $book->name ?></p>
                            <p class="text-light text-center"><?= $book->author->name ?> <?= $book->author->surname ?></p>
                        </div>
                    </div>
                    <div class="face face2" style="background-image: url('images/<?php echo $book['image']?>'); background-size: cover; "></div>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="<?php echo Url::toRoute(['site/book', 'id'=>$category['id']]); ?>" class="text-dark text-center">Показать еще</a>
    <?php endforeach; ?>
    </div>
</div>
