<?php
function config()
{
    return ['App\\' => 'app/', 'AutoloadNormal\\' => ''];
}
function Autoloader($class)
{
    $prefix = null;
    $root = null;
    foreach (config() as $key => $value) {
        if (preg_match('/^'.preg_quote($key).'/', $class)) {
            $prefix = $key;
            $root = $value;
        }
    }
    if ($prefix != null) {
        $classWithoutPrefix = preg_replace('/^'.preg_quote($prefix).'/', '', $class);
        $path = __DIR__.'/'.$root.$classWithoutPrefix.'.php';
        if (file_exists($path)) {
            require_once $path;
        }
    }
}

spl_autoload_register('Autoloader');