<?php

include '../vendor/autoload.php';

use Goodby\CSV\Import\Standard\LexerConfig;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\Lexer;

$file = './files/Convert.csv';


$config = new LexerConfig();
$lexer = new Lexer($config);

$interpreter = new Interpreter();
$data = [];
$interpreter->addObserver(function(array $columns) use (&$data) {
    $data[] = array_map(function($col) { return trim($col); },$columns);
});
$lexer->parse($file, $interpreter);
echo "\n\n\n\n\n";
print_r(json_encode($data));
echo "\n\n\n\n\n";
// var_dump($data);
