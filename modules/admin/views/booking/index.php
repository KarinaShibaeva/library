<?php

use app\models\Booking;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\BookingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Бронирование');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'surname',
            'name',
            'patronymic',
            'email:email',
            //'book_name',
            //'book_author',
            //'date',
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
                'urlCreator' => function ($action, Booking $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
