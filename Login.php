<?php
// Include the Autoloader Method
require_once 'Autoloader.php';
$format->header($conf);
print $hello->today();
$Index->login();
$format->footer($conf);

