<?php

require_once __DIR__.'/../../vendor/autoload.php';
require_once __DIR__.'/config.php';
require_once __DIR__.'/Container.php';
require_once __DIR__.'/functions.php';
require_once __DIR__.'/Validator.php';
require_once __DIR__.'/Database.php';
require_once __DIR__.'/Model.php';
require_once __DIR__.'/View.php';
require_once __DIR__.'/Controller.php';
require_once __DIR__.'/Router.php';
require_once __DIR__.'/App.php';
require_once __DIR__.'/../../util/mail.php';

// lazy load models
spl_autoload_register(function ($className) {
    require_once __DIR__."/../models/$className.php";
});
