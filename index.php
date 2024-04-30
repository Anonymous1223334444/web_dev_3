<?php
    $url = isset($_GET['url']) ? $_GET['url'] : '/';

    $routes = [
        '/' => 'pages/Home.php',
        '/login' => 'pages/Login.php',
    ];

    if (array_key_exists($url, $routes)) {
        include($routes[$url]);
    } else {
        http_response_code(404);
        echo "Page inexistant";
    }
?>