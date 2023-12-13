<?php

/** @var yii\web\View $this */

use yii\bootstrap5\LinkPager;
use yii\helpers\Url;

?>
<style>
    .card {
        z-index: 0;
        overflow: hidden;

    &:hover {
         transition: all 0.2s ease-out;
         box-shadow: 0px 4px 8px rgba(38, 38, 38, 0.2);
         top: -4px;
     }

    &:before {
         content: "";
         position: absolute;
         z-index: -1;
         top: -16px;
         right: -16px;
         height: 32px;
         width: 32px;
         border-radius: 32px;
         transform: scale(2);
         transform-origin: 50% 50%;
         transition: transform 0.15s ease-out;
     }

    &:hover:before {
         transform: scale(2.15);
     }
    }
    .pagination > li > a
    {
        background-color: white;
        color: #745544;
    }

    .pagination > li > a:focus,
    .pagination > li > a:hover,
    .pagination > li > span:focus,
    .pagination > li > span:hover
    {
        color: #5a5a5a;
        background-color: #eee;
        border-color: #ddd;
    }

    .pagination > .active > a
    {
        color: white;
        background-color: #745544 !Important;
        border: solid 1px #745544 !Important;
    }

    .pagination > .active > a:hover
    {
        background-color: #745544 !Important;
        border: solid 1px #745544;
    }
</style>
<div class="d-flex flex-column justify-content-center align-items-center w-100 mt-5" style="background-color: #eee4e4">
    <h1 class="text-center mt-5" style="color: #745544;">Новости</h1>
    <div class="d-flex flex-wrap w-75 mt-4">
        <?php foreach ($posts as $news):?>
            <div class="col-lg-4 mb-4">
                <a class="text-dark text-decoration-none" href="<?php echo Url::toRoute(['site/news', 'id'=>$news->id]) ?>">
                <div class="card h-100" style="width: 18rem;">
                    <img src="../images/<?php echo $news['image']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                            <h5 class="card-title"><?php echo $news['title']?></h5>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary"><?php echo $news['date']?></small>
                    </div>
                </div>
                </a>
            </div>
        <?php endforeach;?>
    </div>
    <div class="h-100 d-flex align-items-center justify-content-center mt-5">
        <?php echo LinkPager::widget([
            'pagination' => $pages,]);?>
    </div>
</div>
