<style>
    .btn{
        background: #745544;
        color: white;
    }
    body{
        background-color: #eee4e4;
    }
</style>

<div class="admin-default-index">
    <h1>Добро пожаловать в админ панель!</h1>
    <p>Здесь можно редактировать:</p>
    <ul>
        <li>Статусы заявок на продление книги</li>
        <li>Статусы заявок на бронирование книги</li>
        <li>Статусы комментариев</li>
        <li>Добавлять новые книги</li>
        <li>Добавлять авторов</li>
    </ul>
    <div class="my-3">
        <button type="button" class="btn btn-light"><a href="<?php use yii\helpers\Url; echo Url::toRoute(['application/index'])?>" class="text-light text-decoration-none">Заявки</a></button>
        <button type="button" class="btn btn-light"><a href="<?php echo Url::toRoute(['book/index'])?>" class="text-light text-decoration-none">Книги</a></button>
        <button type="button" class="btn btn-light"><a href="<?php echo Url::toRoute(['comment/index'])?>" class="text-light text-decoration-none">Комментарии</a></button>
        <button type="button" class="btn btn-light"><a href="<?php echo Url::toRoute(['author/index'])?>" class="text-light text-decoration-none">Авторы</a></button>
        <!--<button type="button" class="btn btn-light"><a href="<//?php echo Url::toRoute(['publishinghouse/index'])?>" class="text-light text-decoration-none">Издательства</a></button>!-->
        <button type="button" class="btn btn-light"><a href="<?php echo Url::toRoute(['booking/index'])?>" class="text-light text-decoration-none">Бронирование</a></button>
    </div>
</div>
