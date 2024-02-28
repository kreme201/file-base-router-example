<?php declare(strict_types=1);

$data      = require APP_PATH . '/data/board.php';
$board_id  = $_GET['id'] ?? '';
$board_idx = array_search($board_id, array_column($data, 'id'));

if (false === $board_idx || ! array_key_exists($board_idx, $data)) {
    http_response_code(404);
    echo json_encode(['error' => true, 'message' => 'not founded']);
} else {
    echo json_encode($data[$board_idx], JSON_PRETTY_PRINT);
}
