<?php
spl_autoload_register(function ($class) {
    if (!class_exists($class, false)) {

        $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
});