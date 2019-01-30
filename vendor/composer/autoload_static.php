<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita96c6dbc01e1938c115addac96809d55
{
    public static $classMap = array (
        'Db' => __DIR__ . '/../..' . '/php/db/db.php',
        'Input' => __DIR__ . '/../..' . '/php/registration/input_values.php',
        'Register' => __DIR__ . '/../..' . '/php/registration/check.php',
        'UserInDb' => __DIR__ . '/../..' . '/php/log-in/check_user_in_db.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInita96c6dbc01e1938c115addac96809d55::$classMap;

        }, null, ClassLoader::class);
    }
}
