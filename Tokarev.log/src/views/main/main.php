<h1>Статьи</h1>
<?php foreach($articles as  $article): ?>
    <h2> <?= $article['Name']?> </h2>
    <p> <?= $article['Text']?> </p>
    <hr>
<?php endforeach; ?>