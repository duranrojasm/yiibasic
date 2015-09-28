<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\web\themes\thm2\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class thm2 extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
    'themes/thm2/css/bootstrap.css',
    'themes/thm2/css/bootstrap.min.css',
    'themes/thm2/css/freelancer.css',
    'themes/thm2/css/font-awesome/css/font-awesome.css',
    'themes/thm2/css/font-awesome/css/font-awesome.min.css',
    'themes/thm2/css/font-awesome/less/bordered-pulled.less',
    'themes/thm2/css/font-awesome/less/core.less',
    'themes/thm2/css/font-awesome/less/fixed-width.less',
    'themes/thm2/css/font-awesome/less/font-awesome.less',
    'themes/thm2/css/font-awesome/less/icons.less',
    'themes/thm2/css/font-awesome/less/larger.less',
    'themes/thm2/css/font-awesome/less/list.less',
    'themes/thm2/css/font-awesome/less/mixins.less',
    'themes/thm2/css/font-awesome/less/path.less',
    'themes/thm2/css/font-awesome/less/rotated-flipped.less',
    'themes/thm2/css/font-awesome/less/spinning.less',
    'themes/thm2/css/font-awesome/less/stacked.less',
    'themes/thm2/css/font-awesome/less/variables.less',
    'themes/thm2/css/font-awesome/scss/_bordered-pulled.scss',
    'themes/thm2/css/font-awesome/scss/_core.scss',
    'themes/thm2/css/font-awesome/scss/_fixed-width.scss',
    'themes/thm2/css/font-awesome/scss/font-awesome.scss',
    'themes/thm2/css/font-awesome/scss/_icons.scss',
    'themes/thm2/css/font-awesome/scss/_larger.scss',
    'themes/thm2/css/font-awesome/scss/_list.scss',
    'themes/thm2/css/font-awesome/scss/_mixins.scss',
    'themes/thm2/css/font-awesome/scss/_path.scss',
    'themes/thm2/css/font-awesome/scss/_rotated-flipped.scss',
    'themes/thm2/css/font-awesome/scss/_spinning.scss',
    'themes/thm2/css/font-awesome/scss/_stacked.scss',
    'themes/thm2/css/font-awesome/scss/_variables.scss',
    'themes/thm2/css/mixins.less',
    'themes/thm2/css/variables.less',
    'themes/thm2/css/freelancer.less',

    ];
    public $js = [
    'themes/thm2/js/bootstrap.js',
    'themes/thm2/js/bootstrap.min.js',
    'themes/thm2/js/jqBootstrapValidation.js',
    'themes/thm2/js/jquery.js',
    'themes/thm2/js/classie.js',
    'themes/thm2/js/freelancer.js',
    'themes/thm2/js/jquery.js',
    'themes/thm2/js/contact_me.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
