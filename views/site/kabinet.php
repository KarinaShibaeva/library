<div class="mt-5 d-flex flex-column justify-content-center align-items-center" style="background-color: #eee4e4; height: 20em;">
    <?php
    if(Yii::$app->session->hasFlash('noRequests')) {
        echo '<div class="alert alert-light mt-5">' . Yii::$app->session->getFlash('noRequests') . '</div>';
    }
    ?>

    <?php foreach ($applications as $application):?>
        <h3 class="text-center mt-5" style="color: #745544;">Заявка на продление книги:</h3>
    <div class="alert alert-secondary w-75" role="alert">
        <h4 class="alert-heading">Заявка номер: <?php echo $application['id']?></h4>
        <p>Фамилия: <?php echo $application->surname . '<br>';?>
            Имя: <?php echo $application->name . '<br>';?>
            Отчество: <?php echo $application->patronymic . '<br>';?>
            Название книги: <?php echo $application->book . '<br>';?>
            Автор книги: <?php echo $application->author . '<br>';?>
            Дата: <?php echo $application->date . '<br>';?></p>
        <hr>
        <p class="mb-0 fw-bold"><?php echo $application->getStatus() . '<br>';?></p>
    </div>
    <?php endforeach;?>

    <?php foreach ($bookings as $booking):?>
        <h3 class="text-center mt-1" style="color: #745544;">Бронирование книги:</h3>
        <div class="alert alert-secondary w-75" role="alert">
            <h4 class="alert-heading">Заявка номер: <?php echo $booking['id']?></h4>
            <p>Фамилия: <?php echo $booking->surname . '<br>';?>
                Имя: <?php echo $booking->name . '<br>';?>
                Отчество: <?php echo $booking->patronymic . '<br>';?>
                Название книги: <?php echo $booking->book_name . '<br>';?>
                Автор книги: <?php echo $booking->book_author . '<br>';?>
                Дата: <?php echo $booking->date . '<br>';?></p>
            <hr>
            <p class="mb-0 fw-bold"><?php echo $booking->getStatus() . '<br>';?></p>
            <?php if ($booking->status === 1):?>
                <p>Чтобы получить книгу необходимо посетить библиотеку до <?php echo $booking->date?></p>
            <?php endif;?>
            <?php if ($booking->status === 2):?>
                <p>Данная книга уже забронирована или находится на руках у читателя</p>
            <?php endif;?>
        </div>
    <?php endforeach;?>
</div>
