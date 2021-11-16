<?php
const app_name = 'FunCooly';

function render(string $name, array $vars = []): string {
    ob_start();
    import("tpl.$name", $vars);
    return ob_get_clean();
}

function import(string $__script, array $__vars = [], bool $__required = true, bool $__once = false): mixed {
    $__script = root_dir() . strtr($__script, '.', DIRECTORY_SEPARATOR) . '.php';
    extract($__vars);
    return $__required ? ($__once ? require_once $__script : require $__script) : ($__once ? include_once $__script : include $__script);
}

function root_dir(): string {
    return dirname(__DIR__) . DIRECTORY_SEPARATOR;
}

function base_url(): string {
    return '/';
}

$sources_indexes = ['index', 'home'];
$sources_extension = '.php';
$sources_directory = root_dir() . 'src/main/';

$request_uri = $_SERVER['REQUEST_URI'];
$request_method = $_SERVER['REQUEST_METHOD'];
$request_scheme = $_SERVER['REQUEST_SCHEME'] ?? 'http';

$request_path = parse_url($request_uri, PHP_URL_PATH);
$request_path = preg_replace('/\/+/', '/', $request_path);
$request_path = trim($request_path, '/');
$request_path = str_replace('/', DIRECTORY_SEPARATOR, $request_path);

$request_query = parse_url($request_uri, PHP_URL_QUERY);
parse_str($request_query, $query_data);

$response_code = http_response_code();

if (
    !file_exists($response_file = $sources_directory . $request_path) &&
    !file_exists($response_file = $sources_directory . $request_path . $sources_extension)
)
    $response_code = 404;
elseif (
    is_file($response_file) ||
    is_file($response_file = $sources_directory . $request_path . $request_method . $sources_extension)
)
    $result = require $response_file;
else {
    $found = false;

    foreach ($sources_indexes as $index) {
        if (is_file($response_file = $sources_directory . $request_path . $index . $sources_extension)) {
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
    if (is_file($response_file = $sources_directory . 'errors/' .  $response_code . $sources_extension))
    $result = require $file;
}

http_response_code($response_code);

isset($result) ? exit(is_bool($result) ? (int) $result : (string) $result) : exit;