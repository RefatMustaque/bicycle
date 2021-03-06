<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;


/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    // public $js = [
    //     'javascript/jquery-3.2.1.js',
    // ];
    // public  $jsOptions = ['position' => View::POS_HEAD];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
