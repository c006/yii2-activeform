<?php
namespace c006\activeForm\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Class AppAssets
 *
 * @package c006\crud\assets
 */
class AppAssets extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/c006/yii2-activeform/assets';

    /**
     * @inheritdoc
     */
    public $css = [
        'c006-activeform.css'
    ];

    /**
     * @inheritdoc
     */
    public $js = [
        'c006-activeform.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\widgets\ActiveFormAsset',
    ];

    /**
     * @var array
     */
    public $jsOptions = [
        'position' => View::POS_END,
    ];

}
