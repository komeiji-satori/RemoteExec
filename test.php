<?php
include 'RemoteExec.php';
$result = Remote::Exec('127.0.0.1', 22, [
    "type" => "password",
    "username" => 'root',
    "password" => '',
], [
    // [
    //     "name" => "restart_fpm",
    //     "command" => "service php7.0-fpm restart",
    // ],
    [
        "name" => "count_fpm_thread",
        "command" => "ps -aux|grep -c php-fpm",
    ],
]);
print_r($result);
