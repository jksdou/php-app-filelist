<?php
// error_reporting(0);
define("DIR_INIT", true);
define("SYSTEM_VERSION", '1.0.1');
define("SYSTEM_ROOT", dirname(__FILE__) . '/');
define("ROOT", dirname(SYSTEM_ROOT) . '/');
define("PAGE_ROOT", SYSTEM_ROOT . 'page/');

date_default_timezone_set("PRC");

require SYSTEM_ROOT . 'functions.php';
require SYSTEM_ROOT . 'Cache.class.php';
require SYSTEM_ROOT . 'DirList.class.php';

$CACHE = new Cache();
$conf = $CACHE->get('config');
if (!$conf) {
    // 默认配置
    $config = [
        'admin_username' => 'admin',
        'admin_password' => md5('123456'),
        'brand' => 'PHP目录列表',
        'title' => 'PHP目录列表 | 一款免费开源的本地目录列表PHP程序。',
        'keywords' => '开源,网盘,本地网盘,直链,本地网盘直链,本地网盘目录树,目录列表,文件搜索,文件下载,网站目录列表,目录索引',
        'description' => '一款免费开源的本地目录列表PHP程序。',
        'announce' => '',
        'footer' => '',
        'name_encode' => 'utf8',
        'file_hash' => '1',
        'cache_indexes' => '0',
        'readme_md' => '1',
        'auth' => '0',
        'nav' => 'CROGRAM*http://crogram.org',
    ];
    if (!$CACHE->set('config', $config)) {
        sysmsg('配置项初始化失败，可能无文件写入权限');
    }
    $conf = $CACHE->get('config');
}

$scriptpath = str_replace('\\', '/', $_SERVER['SCRIPT_NAME']);
$sitepath = substr($scriptpath, 0, strrpos($scriptpath, '/'));
$siteurl = (is_https() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $sitepath . '/';

if (isset($_COOKIE["admin_session"])) {
    if ($conf['admin_session'] === $_COOKIE["admin_session"]) {
        $islogin = 1;
    }
}
