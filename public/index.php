<?php declare(strict_types=1);

use Kreme201\FileBaseRouter\Dispatcher;

header('Content-Type: application/json');

define('APP_PATH', dirname(__DIR__) . '/app');

require_once dirname(APP_PATH) . '/vendor/autoload.php';

$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$dispatcher  = new Dispatcher(APP_PATH . '/pages');
$template    = $dispatcher->dispatch($request_uri);

if (false !== $template && file_exists($template)) {
    try {
        include $template;
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode([
            'error'   => true,
            'message' => $e->getMessage(),
        ], JSON_PRETTY_PRINT);
    }
} else {
    http_response_code(404);
    echo json_encode([
        'error'   => true,
        'message' => 'No route was found matching the URL and request method.',
    ], JSON_PRETTY_PRINT);
}
