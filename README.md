# RemoteExec

#### Required Libarary

https://pecl.php.net/package/ssh2

### Demo

```
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
```

![Snipaste_2018-04-25_22-34-22.png](https://i.loli.net/2018/04/25/5ae0944b36411.png)
