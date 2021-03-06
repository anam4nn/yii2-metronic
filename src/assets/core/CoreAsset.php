<?php

namespace akupeduli\metronic\assets\core;

use yii\web\View;
use yii\web\AssetBundle;
use akupeduli\metronic\Metronic;

class CoreAsset extends AssetBundle
{
    public $css = [
        'base/vendors.bundle.css'
    ];
    
    public $js = [
        'base/vendors.bundle.js'
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD
    ];
    
    public function __construct(array $config = [])
    {
        $metronic = Metronic::getComponent();
        $this->sourcePath = $metronic->getAssetPath() . 'vendors/';

        parent::__construct($config);
    }
    
    public static function noPublish() {
        \Yii::$container->setDefinitions([
            self::className() => [
                'css' => [],
                'js' => []
            ]
        ]);
    }
}
