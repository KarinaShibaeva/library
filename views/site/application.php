<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\Records $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\widgets\MaskedInput;

$items = \app\models\Category::find()
    ->select(['name', 'id'])
    ->indexBy('id')
    ->column();

$this->title = 'Отправка заявки на продление книги';

?>
<style>
    .btn{
        background: #745544;
        color: white;
    }
    body{
        background-image: url("images/app.jpg");
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
<div class="d-flex justify-content-center mt-4 mb-3">
    <div class="card w-75 mt-5 align-items-center shadow p-3 mb-5 rounded" style="background-color: #eee4e4;">
        <div class="card-body w-100">
            <h1 style="color: #745544;"><?= Html::encode($this->title) ?></h1>

            <p>Пожалуйста заполните все поля, чтобы отправить заявку:</p>


            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    /*'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],*/
                ],
            ]); ?>
            <div class="d-flex justify-content-between">
                <div class="w-25 me-2"><?= $form->field($model, 'surname')->textInput(['autofocus' => true]) ?></div>

                <div class="w-25 me-2"><?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?></div>

                <div class="w-25 me-2"><?= $form->field($model, 'patronymic')->textInput(['autofocus' => true]) ?></div>

                <div class="w-25"><?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?></div>
            </div>
            <div class="d-flex justify-content-between">
                <div class="w-100 me-2"><?= $form->field($model, 'reader_ticket')->textInput(['autofocus' => true]) ?></div>

                <div class="w-100 me-2"><?= $form->field($model, 'date')->textInput(['type' => 'date']) ?></div>
            </div>
            <div class="d-flex justify-content-between">
                <div class="w-100 me-2"><?= $form->field($model, 'book')->textInput(['autofocus' => true]) ?></div>
                <div class="w-100 me-2"><?= $form->field($model, 'author')->textInput(['autofocus' => true]) ?></div>
            </div>
            <div class="form-group">
                <div>
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-light', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

