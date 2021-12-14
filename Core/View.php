<?php

namespace Core;

class View
{
    public static function render($file, ?array $data = null)
    {
        $layout = dirname(__DIR__) . '/App/Views/base.php';
        if (is_array($data))
            extract($data);
        include_once $layout;
    }
}
