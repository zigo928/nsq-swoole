<?php
/**
 * Publish test
 *
 * @author Janson
 * @create 2017-06-01
 */
require __DIR__ . '/../autoload.php';

$hosts = [
//    ['host' => '192.168.1.50', 'port' => 4150],
//    ['host' => '192.168.1.51', 'port' => 4150]
    ['host' => '127.0.0.1', 'port' => 4150]
];

$cl = 1;
$try = 1;

$client = new Asan\Nsq\Client;
$client->publishTo($hosts, $cl);

$msgs = [
    'From nsq swoole client #1',
    'From nsq swoole client #2',
    'From nsq swoole client #3',
    'From nsq swoole client #4',
];
$client->publish('test', $msgs, 0, $try);

$msgs = "From nsq swoole client normal";
$client->publish('test', $msgs, 0, $try);

$msgs = "From nsq swoole client defer";
$client->publish('test', $msgs, 10, $try);
