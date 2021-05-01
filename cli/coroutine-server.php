<?php

require __DIR__ . '/../vendor/autoload.php';

use Swoole\Coroutine\Server;
use Swoole\Coroutine\Server\Connection;

Co\run(function() {

    go(function () {
        $server = new Server('0.0.0.0', 9501, false);

        $server->handle(function (Connection $conn) {
            while (true) {

                $data = $conn->recv();
                if (!$data) {
                    break;
                }
                $conn->send("hello $data");
            }
            $conn->close();
        });
        echo "Start TCP server :9501\n";
        $server->start();
    });

    go(function () {
        $server = new Server('0.0.0.0', 9502, false);

        $server->handle(function (Connection $conn) {
            while (true) {

                $data = $conn->recv();
                if (!$data) {
                    break;
                }
                $conn->send("hello $data");
            }
            $conn->close();
        });

        echo "Start TCP server :9502\n";
        $server->start();
    });

});
