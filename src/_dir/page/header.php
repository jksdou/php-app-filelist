<?php
if (!defined('IN_CRONLITE')) {
    exit();
}

$navs = explode('|', $conf['nav']);
$nav_links = '';
foreach ($navs as $nav) {
    $nav_arr = explode('*', $nav);
    $nav_links .= '<li class="nav-item"><a class="nav-link" href="' . $nav_arr[1] . '" target="_blank">' . $nav_arr[0] . '</a></li>';
}

?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo $conf['title'] ?></title>
    <meta name="keywords" content="<?php echo $conf['keywords'] ?>" />
    <meta name="description" content="<?php echo $conf['description'] ?>" />
    <link rel="stylesheet" href="//cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.staticfile.org/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.staticfile.org/github-markdown-css/5.1.0/github-markdown.min.css">
    <link rel='stylesheet' href='./_dir/static/css/style.css?v=1002'>
    <link rel="icon shortcut" href="./_dir/static/images/favicon.ico" mce_href="./_dir/static/images/favicon.ico" type="image/x-icon">
</head>

<body>

    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white border-bottom" id="navbar">
        <div class="container big-nav">
            <a class="navbar-brand" href="./">
                <?php echo $conf['brand'] ?>
                <!-- <img src="./_dir/static/images/logo.png" width="40" height="40" class="d-inline-block align-top mr-2" alt="LOGO"> -->
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?php echo $c == 'home' ? 'active' : ''; ?>">
                        <a class="nav-link" href="./">首页</a>
                    </li>
                    <li class="nav-item <?php echo $c == 'admin' ? 'active' : ''; ?>">
                        <a class="nav-link" href="./?c=admin">后台管理</a>
                    </li>
                    <?php echo $nav_links; ?>
                </ul>

                <form class="form-inline my-2 my-lg-0" action="./" method="GET">
                    <input type="text" name="c" required lay-verify="required" autocomplete="off" value="search" style="display: none;">
                    <input name="s" class="form-control mr-sm-2" type="search" placeholder="请输入搜索关键字" aria-label="Search" value="">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"> <i class="fa fa-search" aria-hidden="true"></i> 搜索</button>
                </form>

            </div>
        </div>
    </nav>