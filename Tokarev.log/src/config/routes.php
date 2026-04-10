<?php
return [
    '~^articles/search$~' => [\src\controllers\ArticlesController::class,'search'],


    '~^article/(\d+)/delete$~' => [\src\controllers\ArticlesController::class,'delete'],
    '~^article/(\d+)/edit$~' => [\src\controllers\ArticlesController::class,'edit'],
    '~^article/(\d+)$~' => [\src\controllers\ArticlesController::class,'view'],
    '~^user/register$~' => [\src\controllers\UsersController::class,'signUp'],
    '~^articles/add$~' => [\src\controllers\ArticlesController::class,'add'],
    '~^user/logout$~' => [\src\controllers\UsersController::class,'logout'],
    '~^hello/(.*)$~' => [\src\controllers\MainController::class,'sayHello'],
    '~^user/login$~' => [\src\controllers\UsersController::class,'login'],    
    '~^articles$~' => [\src\controllers\ArticlesController::class,'index'],
    '~^users$~' => [\src\controllers\UsersController::class,'index'],
    '~^$~' => [\src\controllers\MainController::class,'main'],






    
];