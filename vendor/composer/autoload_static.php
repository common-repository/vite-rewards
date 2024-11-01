<?php


namespace Composer\Autoload;

class ComposerStaticInit52830f5b3e4e380800627e6cf0e66fd9
{
    public static $files = array (
        'a19e8cd3aa4160abcc3f6edf7cd368e2' => __DIR__ . '/..' . '/appsbd-wp/appsbd-lite/appsbd_lite/v2/core/class-kernel-lite.php',
        'c2ee1676bdaff559695ea41431ae0b67' => __DIR__ . '/..' . '/appsbd-wp/appsbd-lite/appsbd_lite/v2/helper/base-helper.php',
        'b9e448e1e05e79a8769dfe0386c35098' => __DIR__ . '/../..' . '/vite_reward_lite/core/class-vite-reward-lite.php',
        '599dc5923e58f2abdcd4c2d4e5d06e73' => __DIR__ . '/../..' . '/vite_reward_lite/helper/global-helper.php',
        '3ff38902b5e88686124c9039eb34f5b7' => __DIR__ . '/../..' . '/vite_reward_lite/helper/plugin-helper.php',
        'f004831e730504ea7a216fc2aa21ad8c' => __DIR__ . '/../..' . '/vite_reward_lite/libs/class-vite-reward-loader.php',
    );

    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Vite_Reward_Lite\\' => 17,
        ),
        'A' => 
        array (
            'Appsbd_Lite\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Vite_Reward_Lite\\' => 
        array (
            0 => __DIR__ . '/../..' . '/vite_reward_lite',
        ),
        'Appsbd_Lite\\' => 
        array (
            0 => __DIR__ . '/..' . '/appsbd-wp/appsbd-lite/appsbd_lite',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit52830f5b3e4e380800627e6cf0e66fd9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit52830f5b3e4e380800627e6cf0e66fd9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit52830f5b3e4e380800627e6cf0e66fd9::$classMap;

        }, null, ClassLoader::class);
    }
}
