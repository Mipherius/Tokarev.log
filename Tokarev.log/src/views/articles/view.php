<h1><?=  htmlspecialchars($article->getName()) ?></h1>
<?php if($article->getImg() !== null)  : ?>
    <img  class="img-fluid" src="<?= $article->getImg() ?>" alt="">
<?php endif; ?>
<p><?=  htmlspecialchars($article->getText()) ?></p>
<p>Автор: <?= $article->getAuthor()->getNickname() ?></p>
    <?php if($user): ?>
        <?php if($article->getAuthor()->getID() == $user->getID())  : ?>
            <p><a href="article/<?= $article->getId() ?>/edit">Редактировать</a>
            <a href="article/<?= $article->getId() ?>/delete">Удалить</a></p>    
        <?php endif ?>
    <?php endif; ?>