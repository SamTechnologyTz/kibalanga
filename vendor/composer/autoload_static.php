<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb1c76b17e17bcbbae032ba51261bb48b
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'sam\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'sam\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb1c76b17e17bcbbae032ba51261bb48b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb1c76b17e17bcbbae032ba51261bb48b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb1c76b17e17bcbbae032ba51261bb48b::$classMap;

        }, null, ClassLoader::class);
    }
}
