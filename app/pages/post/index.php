<?php declare(strict_types=1);

$data   = require APP_PATH . '/data/post.php';
$paged  = max(1, (int)($_GET['paged'] ?? 1));
$rpp    = (int)($_GET['rpp'] ?? 10);
$result = array_slice($data, (int) (($paged - 1) * $rpp), $rpp);

echo json_encode($result, JSON_PRETTY_PRINT);
