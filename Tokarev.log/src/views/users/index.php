<h1>Пользователи: </h1>
<?php foreach($users as $user):  ?>
    <h2><?= $user->getNickname() ?></h2>
    <p><?= $user->getIsConfirmed() ? "Подтверждён" : "Не подтверждён" ?></p>
    <p>Роль: <?= $user->getRole() ?></p>
    <p>Дата регистрации: <?= $user->getCreatedAt() ?></p>
    <p>Почта: <?= $user->getEmail() ?></p>
    <hr>
<?php endforeach; ?>