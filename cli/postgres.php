<?php

require __DIR__ . '/../vendor/autoload.php';

Co\run(function () {
  $db = new \Swoole\Coroutine\PostgreSQL();
  $db->connect('host=db;port=5432;dbname=postgres;user=postgres;password=postgres');

  defer(function () use ($db) {
    $sql = <<<SQL
CREATE TABLE IF NOT EXISTS test(
   id SERIAL PRIMARY KEY,
   increment INT NOT NULL
);
SQL;

    $db->prepare('create_table', $sql);
    $db->execute('create_table', []);
  });

  defer(function () use ($db) {
    $db->prepare('insert', 'INSERT INTO test (increment) VALUES ($1)');
    $db->execute('insert', [1]);
  });

  defer(function () use ($db) {
    $db->prepare('test', 'SELECT * FROM test');
    $res = $db->execute('test', []);
    $arr = $db->fetchAll($res);

    var_dump($arr);
  });
});
