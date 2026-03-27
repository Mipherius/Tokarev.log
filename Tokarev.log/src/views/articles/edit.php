<h1> Редактирование: <?= $article->getName()?></h1>
<p> <?= $article->getText()?> </p>
<p> Автор: <?= $article->getAuthor()->getNickname()?> </p>
<hr>
<form action="" method="POST">
    <label>Название статьи: <input type="text" name="name" value="<?= $article->getName() ?>"></label>
    <!-- <label>Название статьи: <textarea name="name"><?= $article->getName() ?></textarea> </label> -->
    <br>
     <label>Текст статьи: <textarea name="text" rows="10" cols="80"><?= $article->getText() ?></textarea> </label>
    <br>
    <input type="submit" value="Обновить">
</form>