<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4d0d47a609f47c6a321a4d03c806cec3
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'AutoloadOne\\' => 12,
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'AutoloadOne\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Helpers\\LoginHelper' => __DIR__ . '/../..' . '/helpers/LoginHelper.php',
        'Helpers\\SocialHelper' => __DIR__ . '/../..' . '/helpers/SocialHelper.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4d0d47a609f47c6a321a4d03c806cec3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4d0d47a609f47c6a321a4d03c806cec3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4d0d47a609f47c6a321a4d03c806cec3::$classMap;

        }, null, ClassLoader::class);
    }
}
