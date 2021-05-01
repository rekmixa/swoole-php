<?php

require __DIR__ . '/../vendor/autoload.php';

Co\run(function() {
  go(function() {
    while (true) {
      sleep(1);
      echo "Done 1\n";
    }
  });

  go(function() {
    while (true) {
      sleep(1);
      echo "Done 2\n";
    }
});

  go(function() {
    while (true) {
      sleep(1);
      echo "Done 3\n";
    }
  });
});
