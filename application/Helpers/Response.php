<?php

if (! function_exists('isTemplate')) {
    function isTemplate($template = '')
    {
        $path = TEMPLATE . '/' . $template;
        if (is_file($path)) {
            return $path;
        }

        return false;
    }
}

if (! function_exists('view')) {
    function view($template = '', array $data = [])
    {
        if (isTemplate($template)) {

            ob_start();

            if (count($data) > 0) extract($data);

            include isTemplate($template);

            return ob_get_clean();
        }

        return new Exception("파일을 찾을 수 없습니다.");
    }
}

if (! function_exists('json')) {
    function json(array $data = [], $charset = 'UTF-8')
    {
        header("Content-type: application/json; charset={$charset}");

        ob_start();

        echo json_encode($data);

        return ob_get_clean();
    }
}

if (! function_exists('redirect')) {
    function redirect($target = '')
    {
        if ($target === '') {
            $target = APP_URL;
        }

        header("Location: {$target}");
        die;
    }
}
