<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'youthinc-ui/assets/css/bootstrap.min.css',
        'css/site.css',
        'css/style.css',
        'css/Form.css',
        'css/font-awesome/4.5.0/css/font-awesome.min.css',
        'youthinc-ui/assets/css/fonts.googleapis.com.css',
        'youthinc-ui/assets/css/ace.min.css',
        'youthinc-ui/assets/css/ace-skins.min.css',
        'youthinc-ui/assets/css/ace-rtl.min.css',
        
//        'youthinc-ui/assets/font-awesome/4.5.0/css/font-awesome.min.css',
//        'youthinc-ui/assets/font-awesome/4.5.0/css/font-awesome.min.css',
//        
        
    ];
    public $js = [
        'https://www.gstatic.com/charts/loader.js',
        'youthinc-ui/assets/js/ace-extra.min.js',
        'youthinc-ui/assets/js/bootstrap.min.js',
        'youthinc-ui/assets/js/bootstrap-tag.min.js',
        'youthinc-ui/assets/js/jquery.hotkeys.index.min.js',
        'youthinc-ui/assets/js/bootstrap-wysiwyg.min.js',
        'youthinc-ui/assets/js/ace-elements.min.js',
        'youthinc-ui/assets/js/ace.min.js',
        'youthinc-ui/assets/js/common.js',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
