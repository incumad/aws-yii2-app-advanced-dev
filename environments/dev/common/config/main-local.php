<?php

if (isset($_SERVER)) {
    // Web server
    $dbHost = $_SERVER['RDS_HOSTNAME'];
    $dbPort = $_SERVER['RDS_PORT'];
    $dbName = $_SERVER['RDS_DB_NAME'];
    $username = $_SERVER['RDS_USERNAME'];
    $password = $_SERVER['RDS_PASSWORD'];
} else {
    // Console
    $dbHost = getenv('RDS_HOSTNAME');
    $dbPort = getenv('RDS_PORT');
    $dbName = getenv('RDS_DB_NAME');
    $username = getenv('RDS_USERNAME');
    $password = getenv('RDS_PASSWORD');
}

$dsn = "mysql:host={$dbHost};port={$dbPort};dbname={$dbName}";

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
