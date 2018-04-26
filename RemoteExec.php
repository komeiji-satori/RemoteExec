<?php
class Remote
{
    public static function Exec($host = "127.0.0.1", $port = 22, $auth = [], $commands = [])
    {
        if (!function_exists("ssh2_connect")) {
            return false;
        }
        $result = [];
        $connection = ssh2_connect($host, $port);
        if ($auth["type"] == "pubkey") {
            ssh2_auth_pubkey_file($connection, $auth["username"], $auth["public_key"], $auth["private_key"], $auth["password"]);
        } else {
            ssh2_auth_password($connection, $auth["username"], $auth["password"]);
        }
        foreach ($commands as $command) {
            $stream = ssh2_exec($connection, $command["command"]);
            stream_set_blocking($stream, true);
            $result[$command["name"]] = stream_get_contents($stream);
        }
        return $result;
    }
}
