<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/12/2014
 * Time: 7:44 PM
 */
namespace c006\activeForm;

use c006\activeForm\assets\AppAssets;
use yii\base\InvalidConfigException;
use yii\helpers\Html;

class ActiveForm extends \yii\widgets\ActiveForm
{

    /**
     * @var string the default field class name when calling [[field()]] to create a new field.
     * @see fieldConfig
     */
    public $fieldClass = 'c006\activeForm\assets\ActiveField';

    /**
     * @var array HTML attributes for the form tag. Default is `['role' => 'form']`.
     */
    public $options = ['role' => 'form'];

    /**
     * @var string the form layout. Either 'default', 'horizontal' or 'inline'.
     * By choosing a layout, an appropriate default field configuration is applied. This will
     * render the form fields with slightly different markup for each layout. You can
     * override these defaults through [[fieldConfig]].
     * @see \yii\bootstrap\ActiveField for details on Bootstrap 3 field configuration
     */
    public $layout = 'default';


    /**
     * @inheritdoc
     */
    public function init()
    {
        if (!in_array($this->layout, ['default', 'horizontal', 'inline'])) {
            throw new InvalidConfigException('Invalid layout type: ' . $this->layout);
        }
        if ($this->layout !== 'default') {
            Html::addCssClass($this->options, 'form-' . $this->layout);
        }
        parent::init();
        $view = $this->getView();
        AppAssets::register($view);
    }

}
