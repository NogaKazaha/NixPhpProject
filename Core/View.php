<?php

namespace Core;

class View
{
    public static function render($file)
    {
        $layout = file_get_contents(dirname(__DIR__) . '/App/Views/base.php');
        $content = file_get_contents(dirname(__DIR__) . '/App/Views/' . $file);
        print(str_replace('$content', $content, $layout));
    }
}
