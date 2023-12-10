<?php
if(Yii::$app->session->hasFlash('noRequests')) {
    echo '<div class="alert alert-light">' . Yii::$app->session->getFlash('noRequests') . '</div>';
}
?>

<?php foreach ($applications as $application):?>
    <div class="alert alert-secondary" role="alert">
        <h4 class="alert-heading">Заявка номер: <?php echo $application['id']?></h4>
        <p>Фамилия: <?php echo $application->child_surname . '<br>';?>
            Имя: <?php echo $application->child_name . '<br>';?>
            Отчество: <?php echo $application->child_patronymic . '<br>';?>
            Кружок: <?php echo $application->section->name . '<br>';?></p>
        <hr>
        <p class="mb-0"><?php echo $application->getStatus() . '<br>';?></p>
    </div>
<?php endforeach;?>