<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\web\themes\thm1\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class thm1 extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
    'themes/thm1/css/bootstrap.css',
    'themes/thm1/css/bootstrap.min.css',
    'themes/thm1/css/modern-business.css',
    'themes/thm1/font-awesome/css/font-awesome.css',
    'themes/thm1/font-awesome/css/font-awesome.min.css',
   
    ];
    public $js = [
    'themes/thm1/js/bootstrap.js',
    'themes/thm1/js/bootstrap.min.js',
    'themes/thm1/js/jqBootstrapValidation.js',
    'themes/thm1/js/jquery.js',
    'themes/thm1/js/main.js',
    'themes/thm1/js/bootstrap-carousel.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
