<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/12/2014
 * Time: 7:46 PM
 */
namespace c006\activeForm\assets;

use yii\helpers\ArrayHelper;
use yii\helpers\BaseHtml;
use yii\helpers\Html;
use yii\widgets\ActiveField as ActiveFieldBase;

/**
 * Class ActiveField
 * @package c006\activeForm\assets
 */
class ActiveField extends \yii\widgets\ActiveField
{


    /**
     * @param array $options
     * @param bool|TRUE $enclosedByLabel
     *
     * @return $this
     */
    public function checkbox($options = [], $enclosedByLabel = TRUE)
    {
        if ($enclosedByLabel) {
            $this->parts['{input}'] = Html::activeCheckbox($this->model, $this->attribute, $options);
            $this->parts['{label}'] = '';
        } else {
            if (isset($options['label']) && !isset($this->parts['{label}'])) {
                $this->parts['{label}'] = $options['label'];
                if (!empty($options['labelOptions'])) {
                    $this->labelOptions = $options['labelOptions'];
                }
            }
            unset($options['labelOptions']);
            $options['label'] = NULL;
            $this->parts['{input}'] = Html::activeCheckbox($this->model, $this->attribute, $options);
        }
        $this->adjustLabelFor($options);

        return $this;
    }


    /**
     * @param array $options
     * @param bool|TRUE $enclosedByLabel
     * @param string $on_label
     * @param string $off_label
     *
     * @return $this
     */
    public function toggle($options = [], $enclosedByLabel = TRUE, $on_label = 'ON', $off_label = 'OFF')
    {
        if (isset($options['label']) && !isset($this->parts['{label}'])) {
            $this->parts['{label}'] = $options['label'];
            if (!empty($options['labelOptions'])) {
                $this->labelOptions = $options['labelOptions'];
            }
        }
        if ($enclosedByLabel) {
            $this->labelOptions = ['class' => 'c006-block'];
            $this->parts['{input}'] = '
<div class="c006-activeform-toggle-container ' . BaseHtml::getInputId($this->model, $this->attribute) . '" >
    <span class="c006-activeform-toggle-on c006-activeform-on" ><span>' . $on_label . '</span></span>
    <span class="c006-activeform-toggle-off c006-activeform-off"><span>' . $off_label . '</span></span>
    ' . Html::activeHiddenInput($this->model, $this->attribute, $this->inputOptions) . '
</div>
';
        } else {
            unset($options['labelOptions']);
            $options['label'] = NULL;
            $this->parts['{input}'] = '
<div class="c006-activeform-toggle-container ' . BaseHtml::getInputId($this->model, $this->attribute) . '" " >
<div class="table">
    <span class="c006-activeform-toggle-on c006-activeform-on" ><span>ON</span></span>
    <span class="c006-activeform-toggle-off c006-activeform-off"><span>OFF</span></span>
    ' . Html::activeHiddenInput($this->model, $this->attribute, $this->inputOptions) . '
</div>
</div>
';
        }
        $this->adjustLabelFor($options);

        return $this;
    }


    /**
     * Hides the element including label
     *
     * @param array $options
     *
     * @return $this
     */
    public function hide($options = [])
    {
        if (isset($this->options['class'])) {
            $this->options['class'] .= ' hide';
        } else {
            $this->options['class'] = 'hide';
        }
        $this->options += $options;

        return ActiveFieldBase::hiddenInput($this->options);


    }

    /**
     * @param array $options
     *
     * @return $this
     */
    public function hiddenInput($options = [])
    {
        $renderParts = ArrayHelper::remove($options, 'renderParts', FALSE);
        $options = array_merge($this->inputOptions, $options);
        $this->adjustLabelFor($options);
        $this->parts['{input}'] = Html::activeHiddenInput($this->model, $this->attribute, $options);
        if ($renderParts) {
            if (!in_array('label', $renderParts)) {
                $this->parts['{label}'] = '';
            }
            if (!in_array('error', $renderParts)) {
                $this->parts['{error}'] = '';
            }
            if (!in_array('hint', $renderParts)) {
                $this->parts['{hint}'] = '';
            }
        } else {
            $this->parts['{label}'] = $this->parts['{error}'] = $this->parts['{hint}'] = '';
        }

        return $this;
    }

    /**
     * @param array $options
     * @param bool|TRUE $enclosedByLabel
     * @param string $on_label
     * @param string $off_label
     *
     * @return mixed
     */
    public function onOff($options = [], $enclosedByLabel = TRUE, $on_label = 'ON', $off_label = 'OFF')
    {
        if (isset($options['label']) && !isset($this->parts['{label}'])) {
            $this->parts['{label}'] = $options['label'];
            if (!empty($options['labelOptions'])) {
                $this->labelOptions = $options['labelOptions'];
            }
        }

      return  ActiveField::dropDownList([$off_label, $on_label], $this->options);
    }

}
