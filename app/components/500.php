<h2>404 Page</h2>

<?php
if (isset($e) && $e instanceof Exception) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
}

include COMPONENT_PATH . '/link.php';
