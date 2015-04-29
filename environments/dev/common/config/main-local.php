<?php

$dbHost = $_SERVER['RDS_HOSTNAME'];
$dbPort = $_SERVER['RDS_PORT'];
$dbName = $_SERVER['RDS_DB_NAME'];

$dsn = "mysql:host={$dbHost};port={$dbPort};dbname={$dbName}";
$username = $_SERVER['RDS_USERNAME'];
$password = $_SERVER['RDS_PASSWORD'];

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => $dsn,
            'username' => $username,
            'password' => $password,
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
