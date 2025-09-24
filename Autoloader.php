
<?php

require 'vendor/autoload.php';
require_once 'config.php';

$directories = ['Global', 'Formats', 'Index', 'Tasks'];

spl_autoload_register(function ($className) use ($directories) {
    foreach ($directories as $directory) {
        $filePath = __DIR__ . "/$directory/" . $className . '.php';
        if (file_exists($filePath)) {
            require_once $filePath;
            return;
        }
    }
}
);

$ObjSendMail = new SendMail();
$index = new Index();
$format = new format();