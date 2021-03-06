<?php

namespace akupeduli\metronic;

use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\web\AssetBundle;

class Metronic extends Component
{
    /** @var string Final component name to be used in the application */
    public static $componentName = 'metronic';

    /** @var string Version of this extension */
    public static $componentVersion = '1.0';

    /** @var string Version of Remark admin template used in this current extension version */
    public static $metronicVersion = '5.0.2';

    ////////////////////////////////////////////
    ////// Constant area ///////////////////////
    ////////////////////////////////////////////

    /** Layout Version */
    const VERSION_1 = 'default';
    const VERSION_2 = 'demo2';
    const VERSION_3 = 'demo3';
    const VERSION_4 = 'demo4';

    /** Layout */
    const LAYOUT_FLUID = 'default';
    const LAYOUT_BOXED = 'boxed';

    /** Header */
    const HEADER_DEFAULT = 'default';
    const HEADER_FIXED   = 'fixed';

    /** Sidebar */
    const SIDEBAR_POSITION_DEFAULT = 'default';
    const SIDEBAR_POSITION_FIXED   = 'fixed';

    /** Sidebar menu */
    const SIDEBAR_TOGGLE_DEFAULT   = 'accordion';
    const SIDEBAR_TOGGLE_DROPDOWN  = 'dropdown';

    /** Footer */
    const FOOTER_DEFAULT = 'default';
    const FOOTER_FIXED   = 'fixed';

    ////////////////////////////////////////////
    ///// Template variable area ///////////////
    ////////////////////////////////////////////

    /** @var string $assetSourcePath Location of the Metronic admin template asset. */
    public $assetSourcePath;

    /** @var string Asset bundle class to be registered in the layout. Customizable 
        via configuration. This class must depends on MetronicAsset. The default will 
        be MetronicAsset itself. 
    */
    public $assetBundleClass;

    public $version = self::VERSION_1;

    /** @var string background path asset and ONLY work for LAYOUT_BOXED
    */
    public $layoutBackground = "";
    public $layoutOption = self::LAYOUT_FLUID;

    public $headerOption = self::HEADER_FIXED;

    public $sidebarPosition = self::SIDEBAR_POSITION_FIXED;

    /* TODO: still in development */
    public $sidebarToggle = self::SIDEBAR_TOGGLE_DEFAULT;

    public $footerOption = self::FOOTER_DEFAULT;

    public $navbarLeftFile  = null;
    public $navbarRightFile = null;
    public $sidebarMenuList = null;

    /**
     * @return null|Metronic|object
     * @throws InvalidConfigException
     */
    public static function getComponent()
    {
        try {
            return \Yii::$app->get(self::$componentName);
        } catch (InvalidConfigException $e) {
            $messageError = 'Component name should be set and named "' . self::$componentName . '".';
            throw new InvalidConfigException($messageError);
        }
    }

    public function getAssetPath()
    {
        return $this->assetSourcePath . '/theme/dist/preview/assets/';
    }

    public function registerAsset($view)
    {
        if ($this->assetSourcePath === null) {
            throw new InvalidConfigException('Please set $assetSourcePath of remark admin template');
        }
        if ($this->assetBundleClass === null) {
            throw new InvalidConfigException('Please set $assetBundleClass property.');
        }
        /** @var AssetBundle $assetBundleClass */
        $assetBundleClass = $this->assetBundleClass;
        $assetBundleClass::register($view);
    }
}