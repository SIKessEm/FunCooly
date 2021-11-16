<?php declare(strict_types=1);

return (function (): array {
    $config_options = [];

    $init_file = __DIR__ . DIRECTORY_SEPARATOR . 'init.json';
    $env_file = __DIR__ . DIRECTORY_SEPARATOR . 'env.ini';

    if (is_readable($init_file)) {
        $config_options = json_decode(
            file_get_contents($init_file),
            true
        );

        if (json_last_error() > 0) {
            fprintf(
                STDERR,
                '%s in %s' . PHP_EOL,
                json_last_error_msg(),
                $init_file
            );
            exit(1);
        }
    }

    if (is_readable($env_file))
        $config_options = array_merge(
            $config_options,
            parse_ini_file(
                $env_file,
                false,
                INI_SCANNER_TYPED
            )
        );

    $config_options['root_dir'] ??= __DIR__;
    $config_options['base_url'] ??= '';

    foreach ($config_options as $option => &$value) {
        if (preg_match('/_(?:dir(?:ectory)?|file)$/i', $option)) {
            if (!file_exists($value))
                $value = $config_options['root_dir'] . DIRECTORY_SEPARATOR . $value;
            $value = realpath($value);

            if (is_dir($value))
                $value .= DIRECTORY_SEPARATOR;
        } elseif (
            preg_match('/_ur[il]$/i', $option) &&
            !preg_match('/^(?:[a-z]*:)?\/\//i', $value)
        ) {
            $value = trim($value, '/');
            $value = $config_options['base_url'] . '/' . $value;
            $value = preg_replace('/\/+/', '/', $value);
        }
        unset($option, $value);
    }

    return $config_options;
})();