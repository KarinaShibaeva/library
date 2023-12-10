<style>
    .btn{
        background: #40176C;
        color: white;
    }
</style>

<div class="admin-default-index">
    <h1>Добро пожаловать в админ панель!</h1>
    <p>Здесь можно редактировать:</p>
    <ul>
        <li>Статусы заявок</li>
        <li>Добавлять новые книги</li>
        <li>Статусы отзвывов</li>
    </ul>
    <div class="my-3">
        <button type="button" class="btn btn-light"><a href="<?php use yii\helpers\Url; echo Url::toRoute(['application/index'])?>" class="text-light text-decoration-none">Заявки</a></button>
        <button type="button" class="btn btn-light"><a href="<?php echo Url::toRoute(['book/index'])?>" class="text-light text-decoration-none">Книги</a></button>
        <button type="button" class="btn btn-light"><a href="<?php echo Url::toRoute(['comment/index'])?>" class="text-light text-decoration-none">Отзывы</a></button>
    </div>
</div>
