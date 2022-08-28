<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/DumbParser.php';

use Receiver\DumbParser;

try {
    $receiver = new DumbParser("https://example.com");
    $result = $receiver->tagsWithCount();

    dd($result);
} catch (Error $error) {
    dd($error);
}