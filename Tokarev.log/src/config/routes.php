<?php
return [
    '~^article/(\d+)/delete$~' => [\src\controllers\ArticleController::class, 'delete'],
    '~^article/(\d+)/edit$~' => [\src\controllers\ArticleController::class, 'edit'],
    '~^article/(\d+)$~' => [\src\controllers\ArticleController::class, 'view'],
    '~^article/create$~' => [\src\controllers\ArticleController::class, 'create'],
    '~^hello/(.*)$~' => [\src\controllers\MainController::class, 'sayHello'],
    '~^articles$~' => [\src\controllers\ArticleController::class, 'index'],
    '~^test$~' => [\src\controllers\TestController::class, 'view'],
    '~^$~' => [\src\controllers\MainController::class, 'main'],
];