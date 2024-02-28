<?php declare(strict_types=1);

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    http_response_code(405);
    echo json_encode(['error' => true, 'message' => 'wrong approach'], JSON_PRETTY_PRINT);
    exit;
}

$data      = require APP_PATH . '/data/board.php';
$board_id  = $_GET['id'] ?? '';
$board_idx = array_search($board_id, array_column($data, 'id'));

if (false === $board_idx || ! array_key_exists($board_idx, $data)) {
    http_response_code(404);
    echo json_encode(['error' => true, 'message' => 'not founded']);
} else {
    $board_data            = $data[$board_idx];
    $board_data['title']   = $_POST['title'] ?? $board_data['title'];
    $board_data['content'] = $_POST['content'] ?? $board_data['content'];

    echo json_encode($board_data, JSON_PRETTY_PRINT);
}
