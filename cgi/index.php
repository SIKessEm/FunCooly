<?php

function env(?string $name = null): mixed {
    static $options;
    if (!isset($options))
        $options = require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app.php';
    return isset($name) ? ($options[$name] ?? null) : $options;
}

function fmt(string $format, string|int|float ...$values): string {
    static $formats;
    if (!isset($formats))
        $formats = import('fmt');

    if (!isset($formats[$format]))
        $formats[$format] = $format;
    return empty($values) ? $formats[$format] : sprintf($formats[$format], ...$values);
}

function lnk(string $path): string {
    $path = trim($path, '/');
    $path = env('base_url')  . '/' . $path;
    $path = preg_replace('/\/+/', '/', $path);
    return $path;
}

function render(string $name, array $vars = []): string {
    ob_start();
    import("tpl.$name", $vars);
    return ob_get_clean();
}

function import(string $__script, array $__vars = [], bool $__required = true, bool $__once = false): mixed {
    $__script = env('root_dir') . DIRECTORY_SEPARATOR . strtr($__script, '.', DIRECTORY_SEPARATOR) . '.php';
    extract($__vars);
    return $__required ? ($__once ? require_once $__script : require $__script) : ($__once ? include_once $__script : include $__script);
}

$request_uri = $_SERVER['REQUEST_URI'];
$request_method = $_SERVER['REQUEST_METHOD'];
$request_scheme = $_SERVER['REQUEST_SCHEME'] ?? 'http';

$request_path = parse_url($request_uri, PHP_URL_PATH);
$request_path = lnk($request_path);
$request_path = str_replace('/', DIRECTORY_SEPARATOR, $request_path);

$request_query = parse_url($request_uri, PHP_URL_QUERY);
parse_str($request_query, $query_data);

$response_code = http_response_code();

extract(env());

if (
    !file_exists($response_file = $src_directory . $request_path) &&
    !file_exists($response_file = $src_directory . $request_path . $src_extension)
)
    $response_code = 404;
elseif (
    is_file($response_file) ||
    is_file($response_file = $src_directory . $request_path . DIRECTORY_SEPARATOR . $request_method . $src_extension)
)
    $result = require $response_file;
else {
    $found = false;

    foreach ($src_indexes as $index) {
        if (is_file($response_file = $src_directory . $request_path . DIRECTORY_SEPARATOR . $index . $src_extension)) {
            $found = true;
            break;
        }
    }

    if ($found)
        $result = require $response_file;
    else
        $response_code = 405;

    unset($found, $index);
}

if ($response_code >= 400 && !isset($result)) {
    if (is_file($response_file = $src_directory . 'errors/' .  $response_code . $src_extension))
    $result = require $file;
}

http_response_code($response_code);

if (!isset($result))
    exit;
elseif (is_bool($result) || is_int($result))
    exit((int) $result);
else
    exit((string) $result);