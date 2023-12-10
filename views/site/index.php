
<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'My Yii Application';
$this->registerCssFile('@web/css/main.css');
?>
<style>
</style>
<div class="content" style="background-color: #eee4e4">
    <div class="d-flex flex-column">
        <h1 class="text-center mt-5" style="color: #745544;">Уважаемые читатели!</h1>
        <div class="ms-5 mt-4 mb-4 d-flex flex-column justify-content-center align-items-center">
            <p class="text w-75">BookLand - это библиотека, которая предлагает широкий выбор книг на самые разные темы и для всех возрастных категорий. Она является источником знаний и развлечений для читателей всех возрастов.</p>
            <p class="text w-75">Библиотека BookLand располагается в просторном и уютном здании со множеством полок с книгами. Каждая полка организована по тематическому принципу, что помогает посетителям быстро находить интересующие их книги. Каждый читатель может выбирать книги самостоятельно, с помощью каталогов или советов библиотекарей.</p>
            <p class="text w-75">BookLand - это источник вдохновения, знаний и удовольствия для всех любителей чтения. Это место, где каждый читатель может найти что-то интересное и развлекательное, а также расширить свои горизонты и быть в курсе последних литературных трендов.</p>
        </div>
    </div>
</div>
<div class="d-flex flex-column justify-content-center align-items-center">
    <h1 class="text-center mt-5">Новости</h1>
    <div class="d-flex flex-row w-100 justify-content-around mt-5">
        <?php foreach ($posts as $news):?>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="../images/<?php echo $news['image']?>" class="card-img" alt="Изображение новости">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $news['title']?></h5>
                            <p class="card-text" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $news['content']?></p>
                            <a href="<?php echo Url::toRoute(['site/news', 'id'=>$news->id]) ?>" class="btn text-light fw-bold" style="background-color: #583c2d">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <a href="#" class="text-reset fs-4 mb-5">Показать все</a>
</div>
<div class="content d-flex flex-column justify-content-center align-items-center" style="background-color: #eee4e4">
    <div class="d-flex flex-column">
        <h1 class="text-center mt-5" style="color: #745544;">Новые книги</h1>
        <div class="mt-4 d-flex w-100 flex-row justify-content-between">
            <?php foreach ($books as $book):?>
            <div class="w-100 h-25 ms-4 d-flex flex-column justify-content-between align-items-center">
                <img src="../images/<?php echo $book['image']?>" style="width: 12rem; height: 17rem; mix-blend-mode: multiply;+">
                <p class="mt-2 fw-bold text-center"><?php echo $book['name']?></p>
                <p><small><?php echo $book->genre->name?></small></p>
                <p><small><?php echo $book['year']?></small></p>
            </div>
            <?php endforeach;?>
        </div>
    </div>
    <a href="#" class="text-reset fs-4 mb-5">Показать все</a>
</div>


