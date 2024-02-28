<?php declare(strict_types=1);

$data = [];

for ($i = 1; $i <= 50; $i++) {
    $data[] = [
        'id'      => $i,
        'title'   => 'Sample Board ' . sprintf('%02d', $i),
        'content' => 'This is Sample Board Content',
    ];
}

return $data;
