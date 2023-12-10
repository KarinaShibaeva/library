<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

?>
<div class="d-flex flex-wrap align-items-center justify-content-center w-100 mt-5">
    <?php foreach ($posts as $news):?>
        <div class="card mb-3 mt-5 ms-5" style="max-width: 540px;">
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
