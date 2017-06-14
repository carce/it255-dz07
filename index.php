<?php

$routes = array(
    'GET /' => function() {
        echo '<p>Koristite GET /greet sa ili bez parametra "name"</p>'
            . '<p>Ili koristite POST /saberi sa parametrima "a", "b" i "c"</p>';
    },

    'GET /greet' => function() {
        echo "Hello,&nbsp;" . ($_GET['name'] ? $_GET['name'] : 'World');
    },

    'POST /saberi' => function() {
        echo '<p>Zbir parametara a, b i c je ' . ($_POST['a'] + $_POST['b'] + $_POST['c']) . '</p>';
    },
);

$current_route = $_SERVER['REQUEST_METHOD'] . ' ' . strtok($_SERVER['REQUEST_URI'], '?');

if (isset($routes[$current_route])) {
    $routes[$current_route]();
}
else {
    echo '404 Page Not Found';
}