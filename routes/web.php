<?php

return [
    '' => [IndexController::class, 'index'],
    'about' => [AboutController::class, 'index'],
    'packages' => [PackagesController::class, 'index'],
    'contact' => [ContactController::class, 'index'],
    'quote' => [QuoteController::class, 'index'],
    'hello' => fn() => 'Hello world',
];
