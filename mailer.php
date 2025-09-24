<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'Autoloader.php';
require_once __DIR__ . '/Global/SendMail.php';

$mailCnt = array(
    'from' => 'githaiga.mundia@gmail.com',
    'from_name' => 'Githaiga',
    'to' => 'mundiamanuel5@gmail.com',
    'to_name' => 'EMMANUEL MUNDIA',
    'subject' => 'Test Email from PHPMailer',
    'body' => '<h1>This is a test email</h1><p>This email is sent using PHPMailer.</p>',
);

$ObjSendMail = new SendMail();

$ObjSendMail->Send_Mail(null, $mailCnt);

echo "Mail sent successfully!";
