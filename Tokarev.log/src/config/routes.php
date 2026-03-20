<?php

return [
    '~^hello/(.*)$~' => [\Src\Controllers\MainController::class, 'sayHello'],
    '~^$~' => [\Src\Controllers\MainController::class, 'main'],
    '~^test$~' => [\Src\Controllers\TestController::class, 'view'],
    
];





