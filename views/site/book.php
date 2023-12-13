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
        <hr>
        <div class="mt-4 d-flex w-100 flex-row justify-content-between">
            <?php foreach ($books as $book):?>
            <a href="<?php echo Url::toRoute(['site/details', 'id'=>$book->id]) ?>"  class="text-dark text-decoration-none">
                <div class="w-100 d-flex flex-column align-items-center">
                    <img src="../images/<?php echo $book['image']?>" style="width: 12rem; height: 17rem; mix-blend-mode: multiply;+">
                    <p class="mt-1 fw-bold text-center"><?php echo $book['name']?></p>
                    <p class="text-center" style="white-space: nowrap;"><?= $book->author->name ?> <?= $book->author->surname ?></p>
                </div>
            </a>
            <?php endforeach;?>
        </div>
    </div>
</div>