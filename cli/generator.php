<?php

require __DIR__ . '/../vendor/autoload.php';

function generator() {
  yield 1;
  yield 2;
  yield 3;
  yield 4;
}

Co\run(function() {
  $test = generator();

  go(function() use ($test) {
    echo 'P1: ' . $test->current() . PHP_EOL;
    $test->next();
    echo 'P1: ' . $test->current() . PHP_EOL;
    $test->next();
  });

  go(function() use ($test) {
    echo 'P2: ' . $test->current() . PHP_EOL;
    $test->next();
    echo 'P2: ' . $test->current() . PHP_EOL;
    $test->next();
  });
});
