<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit01a52db2b7425c3dc251d9b159f73928
{
    public static $files = array (
        'e40631d46120a9c38ea139981f8dab26' => __DIR__ . '/..' . '/ircmaxell/password-compat/lib/password.php',
    );

    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Wamailer\\' => 9,
        ),
        'P' => 
        array (
            'Patchwork\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Wamailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/wascripts/wamailer/lib',
        ),
        'Patchwork\\' => 
        array (
            0 => __DIR__ . '/..' . '/patchwork/utf8/src/Patchwork',
        ),
    );

    public static $prefixesPsr0 = array (
        'E' => 
        array (
            'Elkuku' => 
            array (
                0 => __DIR__ . '/..' . '/elkuku/console-progressbar/src',
            ),
        ),
    );

    public static $classMap = array (
        'Elkuku\\Console\\Helper\\ConsoleProgressBar' => __DIR__ . '/..' . '/elkuku/console-progressbar/src/Elkuku/Console/Helper/ConsoleProgressBar.php',
        'Normalizer' => __DIR__ . '/..' . '/patchwork/utf8/src/Normalizer.php',
        'Patchwork\\PHP\\Shim\\Iconv' => __DIR__ . '/..' . '/patchwork/utf8/src/Patchwork/PHP/Shim/Iconv.php',
        'Patchwork\\PHP\\Shim\\Intl' => __DIR__ . '/..' . '/patchwork/utf8/src/Patchwork/PHP/Shim/Intl.php',
        'Patchwork\\PHP\\Shim\\Mbstring' => __DIR__ . '/..' . '/patchwork/utf8/src/Patchwork/PHP/Shim/Mbstring.php',
        'Patchwork\\PHP\\Shim\\Normalizer' => __DIR__ . '/..' . '/patchwork/utf8/src/Patchwork/PHP/Shim/Normalizer.php',
        'Patchwork\\PHP\\Shim\\Xml' => __DIR__ . '/..' . '/patchwork/utf8/src/Patchwork/PHP/Shim/Xml.php',
        'Patchwork\\TurkishUtf8' => __DIR__ . '/..' . '/patchwork/utf8/src/Patchwork/TurkishUtf8.php',
        'Patchwork\\Utf8' => __DIR__ . '/..' . '/patchwork/utf8/src/Patchwork/Utf8.php',
        'Patchwork\\Utf8\\BestFit' => __DIR__ . '/..' . '/patchwork/utf8/src/Patchwork/Utf8/BestFit.php',
        'Patchwork\\Utf8\\Bootup' => __DIR__ . '/..' . '/patchwork/utf8/src/Patchwork/Utf8/Bootup.php',
        'Patchwork\\Utf8\\WindowsStreamWrapper' => __DIR__ . '/..' . '/patchwork/utf8/src/Patchwork/Utf8/WindowsStreamWrapper.php',
        'Wamailer\\Email' => __DIR__ . '/..' . '/wascripts/wamailer/lib/Email.php',
        'Wamailer\\Mailer' => __DIR__ . '/..' . '/wascripts/wamailer/lib/Mailer.php',
        'Wamailer\\Mime' => __DIR__ . '/..' . '/wascripts/wamailer/lib/Mime.php',
        'Wamailer\\Mime\\Header' => __DIR__ . '/..' . '/wascripts/wamailer/lib/Mime/Header.php',
        'Wamailer\\Mime\\Headers' => __DIR__ . '/..' . '/wascripts/wamailer/lib/Mime/Headers.php',
        'Wamailer\\Mime\\Part' => __DIR__ . '/..' . '/wascripts/wamailer/lib/Mime/Part.php',
        'Wamailer\\SecureMail' => __DIR__ . '/..' . '/wascripts/wamailer/lib/SecureMail.php',
        'Wamailer\\Tools\\Dkim' => __DIR__ . '/..' . '/wascripts/wamailer/lib/Tools/Dkim.php',
        'Wamailer\\Transport\\Handler' => __DIR__ . '/..' . '/wascripts/wamailer/lib/Transport/Handler.php',
        'Wamailer\\Transport\\Mail' => __DIR__ . '/..' . '/wascripts/wamailer/lib/Transport/Mail.php',
        'Wamailer\\Transport\\Sendmail' => __DIR__ . '/..' . '/wascripts/wamailer/lib/Transport/Sendmail.php',
        'Wamailer\\Transport\\Smtp' => __DIR__ . '/..' . '/wascripts/wamailer/lib/Transport/Smtp.php',
        'Wamailer\\Transport\\SmtpClient' => __DIR__ . '/..' . '/wascripts/wamailer/lib/Transport/SmtpClient.php',
        'Wamailer\\Transport\\Transport' => __DIR__ . '/..' . '/wascripts/wamailer/lib/Transport/Transport.php',
        'Wamailer\\Transport\\TransportInterface' => __DIR__ . '/..' . '/wascripts/wamailer/lib/Transport/TransportInterface.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit01a52db2b7425c3dc251d9b159f73928::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit01a52db2b7425c3dc251d9b159f73928::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit01a52db2b7425c3dc251d9b159f73928::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit01a52db2b7425c3dc251d9b159f73928::$classMap;

        }, null, ClassLoader::class);
    }
}
