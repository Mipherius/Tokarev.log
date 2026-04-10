<h1>Статьи</h1>
<?php if($user): ?>
    <p><a href="/Tokarev.log/articles/add">Добавить статью</a></p>
<?php endif ?>
<?php foreach($articles as $article):  ?>
    <h2><?= $article->getName() ?></h2>
    <?php if($article->getImg() !== null)  : ?>
        <img  class="img-fluid" src="<?= $article->getImg() ?>" alt="">
    <?php endif; ?>
    <p><?= $article->getText() ?></p>
    <p>Автор: <?= $article->getAuthor()->getNickname() ?></p>
    <a href="article/<?= $article->getId() ?>">Подробнее</a>
    <?php if($user): ?>
        <?php if($article->getAuthor()->getID() == $user->getID())  : ?>
            <p><a href="article/<?= $article->getId() ?>/edit">Редактировать</a>
            <a href="article/<?= $article->getId() ?>/delete">Удалить</a></p>    
        <?php endif ?>
    <?php endif; ?>
    <hr>
<?php endforeach; ?>