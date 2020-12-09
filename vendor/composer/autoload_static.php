<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5e07728098e9c5b0779feff29e369ef5
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5e07728098e9c5b0779feff29e369ef5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5e07728098e9c5b0779feff29e369ef5::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}