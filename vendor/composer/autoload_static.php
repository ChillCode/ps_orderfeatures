<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7d6bc0eb124e9123fb2c0e0806738e67
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PrestaShop\\Module\\OrderFeatures\\' => 32,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PrestaShop\\Module\\OrderFeatures\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Ps_Orderfeatures' => __DIR__ . '/../..' . '/ps_orderfeatures.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7d6bc0eb124e9123fb2c0e0806738e67::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7d6bc0eb124e9123fb2c0e0806738e67::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7d6bc0eb124e9123fb2c0e0806738e67::$classMap;

        }, null, ClassLoader::class);
    }
}
