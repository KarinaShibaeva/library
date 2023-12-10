<?php

use app\models\Application;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\ApplicationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Заявки на продление книг');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'surname',
            'name',
            'patronymic',
            'email:email',
            'reader_ticket',
            'date',
            'book:ntext',
            'author',
            //'user_id',
            [
                'attribute' => 'status',
                'value' => function($data){
                    return $data->getStatus();
                }
            ],
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
            /*[
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Application $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],*/
        ],
    ]); ?>


</div>
