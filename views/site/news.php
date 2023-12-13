<?php

/** @var yii\web\View $this */
/** @var app\models\Comment $model */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

$items2=\app\models\News::find()
    ->select(['title','id'])
    ->indexBy('id')
    ->column();
$this->title = '';

?>
<style>
    html {
        font-size: 16px;
    }
    .media-body .author {
        display: block;
        font-size: 1.2rem;
        color: #000000;
        font-weight: 700;
    }
    .media-body .metadata {
        display: block;
        color: #000000;
        font-size: .8125rem;
    }
    .title-comments {
        font-size: 1.1rem;
        font-weight: bold;
        line-height: 1.5rem;
        color: rgba(0,0,0,.87);
        margin-bottom: 1rem;
        padding-bottom: .25rem;
        border-bottom: 1px solid rgba(34,36,38,.15);
    }
    .media-left img {
        width: 50px;
    }
    .media {
        margin-top:0px;
    }
</style>

<div class="content d-flex flex-column justify-content-center align-items-center" style="background-color: #eee4e4">
    <div class="d-flex flex-column w-75 mt-3">
        <div class="mt-3 d-flex flex-row">
            <?php foreach ($new as $news):?>
                <div class="d-flex flex-column ms-5">
                    <h3 class="text-start"><?= $news->title ?></h3>
                    <p><img src="../images/<?php echo $news['image']?>" class=" w-50 shadow mb-5 rounded" style=" float:left; margin: 4px 10px 2px 0;"> <?= $news->content ?></p>
                    <p><?= $news->date ?></p>
                </div>
        </div>
        <?php foreach ($goodstatus as $comment):?>
        <div class="comments">
            <h3 class="title-comments">Комментарии (<?php echo $count?>)</h3>
            <ul class="media-list">
                <li class="media">
                    <div class="media-body">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="author"><?php echo $comment->user->username?></div>
                            </div>
                            <div class="panel-body">
                                <div class="media-text text-justify fs-5"><?php echo $comment['body']?></div>
                            </div>
                            <div class="metadata">
                                <span class="date"><?php echo $comment['created_at']?></span>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <?php endforeach;?>
        <?if (Yii::$app->user->isGuest):?>
            <p class="fs-5">Авторизуйтесь чтобы оставить комментарий</p>
        <?php endif;?>
        <?if (!Yii::$app->user->isGuest):?>
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'fieldConfig' => [
                'template' => "{label}\n{input}\n{error}",
                'labelOptions' => ['class' => 'col-form-label mr-lg-3'],
                'inputOptions' => ['class' => 'col-lg-3 form-control'],
                'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
            ],
        ]); ?>

        <?= $form->field($model, 'body')->textarea(['autofocus' => true]) ?>


        <div class="form-group">
            <div>
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-outline-secondary', 'name' => 'login-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php endif;?>
<?php endforeach;?>
</div>
</div>
