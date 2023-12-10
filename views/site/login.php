<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Авторизация';
?>
<style>
    .btn{
        background: #745544;
        color: white;
    }
    body{
        background-image: url("../images/login.jpg");
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
<div class="d-flex justify-content-center mt-5">
    <div class="card w-50 mt-5 align-items-center shadow p-3 mb-5 rounded" style="background-color: #eee4e4;">
        <div class="card-body">
            <h1 style="color: #745544;"><?= Html::encode($this->title) ?></h1>

            <p>Пожалуйста заполните все поля, чтобы войти в аккаунт:</p>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    /*'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],*/
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('Войти', ['class' => 'btn btn-light', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

