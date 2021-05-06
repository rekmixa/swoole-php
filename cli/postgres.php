<?php

require __DIR__ . '/../vendor/autoload.php';

Co\run(function () {
  // $db = new PDO('host=db;port=5432;dbname=postgres', 'postgres', 'postgres');
  // $sql = <<<SQL
  // CREATE table test(
  //   id INT(11) AUTO_INCREMENT PRIMARY KEY,
  //   increment INT(11) NOT NULL, 
  // );
  // SQL;
  
  // $db->exec($sql);

  go(function () {
    $db = new \Swoole\Coroutine\PostgreSQL();
    $db->connect('pgsql:host=db;port=5432;dbname=postgres;dbuser=postgres;dbpass=postgres');
    $sql = <<<SQL
      CREATE table test(
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        increment INT(11) NOT NULL, 
      );
SQL;
  
    $db->prepare('test', $sql);
    $db->execute('test', []);

    // $db->prepare('fortunes', 'SELECT id, message FROM Fortune');
    // $res = $db->execute('fortunes', []);
    // $arr = $db->fetchAll($res);
  
    // $db->prepare('select_query', 'SELECT id, randomnumber FROM World WHERE id = $1');
    // $res = $db->execute('select_query', [123]);
    // $ret = $db->fetchAll($res);
  });
});
