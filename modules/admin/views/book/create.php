<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Book $model */

$this->title = Yii::t('app', 'Добавить книгу');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Книги'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-create" style="margin-top: 27rem;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
