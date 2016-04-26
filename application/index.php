<?php
include_once 'config/prepend.inc.php';

$site = (isset($_GET['site']) && is_dir(CONTROLLERDIR.$_GET['site'].'/'))?$_GET['site']:'admin'/*DEFAULT_SITE*/;
$module = (isset($_GET['module']) && file_exists(CONTROLLERDIR.$site.'/'.$_GET['module'].'Controller.php'))?$_GET['module']:'Spells'/*DEFAULT_MODULE*/;
include_once 'controller/'.$site.'/'.$module.'Controller.php';
$controller = $module.'Controller';
new $controller();

