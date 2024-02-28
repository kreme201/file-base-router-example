<?php declare(strict_types=1);

$data      = require APP_PATH . '/data/post.php';
$post_slug = $_GET['slug'] ?? '';
$post_idx  = array_search($post_slug, array_column($data, 'slug'));

if (false === $post_idx || ! array_key_exists($post_idx, $data)) {
    http_response_code(404);
    echo json_encode(['error' => true, 'message' => 'not founded']);
} else {
    echo json_encode($data[$post_idx], JSON_PRETTY_PRINT);
}
