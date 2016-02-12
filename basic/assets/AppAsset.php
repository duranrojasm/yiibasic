<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
        'themes/thm1/bower_components/metisMenu/dist/metisMenu.min.css',
        'themes/thm1/dist/css/timeline.css',
        'themes/thm1/dist/css/sb-admin-2.css',
        'themes/thm1/bower_components/morrisjs/morris.css',
        'themes/thm1/bower_components/font-awesome/css/font-awesome.min.css',
    ];
    public $js = [
        //'js/main.js',

        'themes/thm1/bower_components/jquery/dist/jquery.min.js',
        'themes/thm1/bower_components/bootstrap/dist/js/bootstrap.min.js',
        'themes/thm1/bower_components/metisMenu/dist/metisMenu.min.js',
        'themes/thm1/bower_components/raphael/raphael-min.js',
        'themes/thm1/bower_components/morrisjs/morris.min.js',
        'themes/thm1/js/morris-data.js',
        'themes/thm1/dist/js/sb-admin-2.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
