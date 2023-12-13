<?php

use app\models\Comment;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\CommentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Комментарии');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'body:ntext',
            'created_at',
            'updated_at',
            'status',
            [
                'attribute' => 'Администрирование',
                'format' => 'html',
                'value' => function($data) {
                    switch ($data->status) {
                        case 0:
                            return Html::a('Одобрить', 'good/?id='.$data->id)."|".
                                Html::a('Отклонить', 'verybad/?id='.$data->id);
                        case 1:
                            return Html::a('Отклонить', 'verybad/?id='.$data->id)."|";
                        case 2:
                            return Html::a('Одобрить', 'good/?id='.$data->id)."|";
                    }
                }
            ],
            //'user_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Comment $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
