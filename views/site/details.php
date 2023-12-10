<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content d-flex flex-column justify-content-center align-items-center" style="background-color: #eee4e4">
    <div class="d-flex flex-column w-75 mt-5">
        <div class="mt-4 d-flex flex-row">
            <?php foreach ($books as $book):?>
                <img src="../images/<?php echo $book['image']?>" class="w-25 h-25 shadow mb-5 rounded">
                <div class="d-flex flex-column ms-5">
                    <h4><?= $book->author->name ?> <?= $book->author->surname ?></h4>
                    <h4><?= $book->name ?></h4>
                    <p><?= $book->description ?></p>
                    <p>Серия: <?= $book->genre->name ?></p>
                    <p>Издательство: <?= $book->publishing_house_id ?></p>
                    <p>Год издания: <?= $book->year ?></p>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
