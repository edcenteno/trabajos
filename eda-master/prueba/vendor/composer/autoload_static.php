<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb9e18a9e5351e2e7e6137d514c1f627a
{
    public static $files = array (
        'c964ee0ededf28c96ebd9db5099ef910' => __DIR__ . '/..' . '/guzzlehttp/promises/src/functions_include.php',
        'a0edc8309cc5e1d60e3047b5df6b7052' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/functions_include.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions_include.php',
        '3a37ebac017bc098e9a86b35401e7a68' => __DIR__ . '/..' . '/mongodb/mongodb/src/functions.php',
        '06dd8487319ccd8403765f5b8c9f2d61' => __DIR__ . '/..' . '/alcaeus/mongo-php-adapter/lib/Mongo/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tecactus\\Sunat\\' => 15,
            'Tecactus\\Reniec\\' => 16,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\Translation\\' => 30,
        ),
        'R' => 
        array (
            'Reniec\\' => 7,
        ),
        'P' => 
        array (
            'Purekid\\Mongodm\\' => 16,
            'Psr\\Http\\Message\\' => 17,
        ),
        'M' => 
        array (
            'MongoDB\\' => 8,
            'Modelo\\' => 7,
            'MinTra\\' => 7,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
            'GuzzleHttp\\Promise\\' => 19,
            'GuzzleHttp\\' => 11,
        ),
        'E' => 
        array (
            'EsSalud\\' => 8,
        ),
        'C' => 
        array (
            'CURL\\' => 5,
        ),
        'A' => 
        array (
            'Alcaeus\\MongoDbAdapter\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tecactus\\Sunat\\' => 
        array (
            0 => __DIR__ . '/..' . '/tecactus/sunat-php/src',
        ),
        'Tecactus\\Reniec\\' => 
        array (
            0 => __DIR__ . '/..' . '/tecactus/reniec-php/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation',
        ),
        'Reniec\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/reniec',
            1 => __DIR__ . '/..' . '/jossmp/reniec/src',
        ),
        'Purekid\\Mongodm\\' => 
        array (
            0 => __DIR__ . '/..' . '/purekid/mongodm/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'MongoDB\\' => 
        array (
            0 => __DIR__ . '/..' . '/mongodb/mongodb/src',
        ),
        'Modelo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/modelo',
        ),
        'MinTra\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/mintra',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
        'GuzzleHttp\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/promises/src',
        ),
        'GuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
        ),
        'EsSalud\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/essalud',
        ),
        'CURL\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Alcaeus\\MongoDbAdapter\\' => 
        array (
            0 => __DIR__ . '/..' . '/alcaeus/mongo-php-adapter/lib/Alcaeus/MongoDbAdapter',
        ),
    );

    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/..' . '/nesbot/carbon/src',
    );

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Mongo' => 
            array (
                0 => __DIR__ . '/..' . '/alcaeus/mongo-php-adapter/lib/Mongo',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb9e18a9e5351e2e7e6137d514c1f627a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb9e18a9e5351e2e7e6137d514c1f627a::$prefixDirsPsr4;
            $loader->fallbackDirsPsr4 = ComposerStaticInitb9e18a9e5351e2e7e6137d514c1f627a::$fallbackDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitb9e18a9e5351e2e7e6137d514c1f627a::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
