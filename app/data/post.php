<?php declare(strict_types=1);

$data = [];

for ($i = 1; $i <= 50; $i++) {
    $data[] = [
        'id'      => $i,
        'slug'    => 'sample-post-' . $i,
        'title'   => 'Sample Post' . sprintf('%02d', $i),
        'content' => 'This is Sample Post Content',
    ];
}

return $data;
