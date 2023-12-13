<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PublishingHouse $model */

$this->title = Yii::t('app', 'Create Publishing House');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Publishing Houses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publishing-house-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
