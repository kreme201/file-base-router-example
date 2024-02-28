<?php
declare(strict_types=1);

use Kreme201\FileBaseRouter\Dispatcher;

define('APP_PATH', dirname(__DIR__) . '/app');
define('COMPONENT_PATH', APP_PATH . '/components');

require_once dirname(APP_PATH) . '/vendor/autoload.php';

$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$dispatcher = new Dispatcher(APP_PATH . '/pages');
$template = $dispatcher->dispatch($request_uri);

if (false !== $template && file_exists($template)) {
    try {
        include $template;
    } catch (Exception $e) {
        http_response_code(500);
        include COMPONENT_PATH . '/500.php';
    }
} else {
    http_response_code(404);
    include COMPONENT_PATH . '/404.php';
}
