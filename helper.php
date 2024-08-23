<?php

function basePath($path = '')
{
    // $firstUri = '/projects/newBackend';

    return __DIR__ . '/' . $path;
    // $pathing = str_replace('\\', '/', $pathing);
    // return $pathing;
    // return   $path;
}

function loadView($name, $data = [])
{
    $viewPath = basePath("App/views/{$name}.view.php");

    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View '{$name} not found!'";
    }
}
