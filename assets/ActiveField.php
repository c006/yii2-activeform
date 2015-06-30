<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/12/2014
 * Time: 7:46 PM
 */
namespace c006\activeForm\assets;

use yii\helpers\BaseHtml;
use yii\helpers\Html;
use yii\widgets\ActiveField as ActiveFieldBase;

class ActiveField extends \yii\widgets\ActiveField
{


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
            $options['label']       = NULL;
            $this->parts['{input}'] = Html::activeCheckbox($this->model, $this->attribute, $options);
        }
        $this->adjustLabelFor($options);

        return $this;
    }


    public function toggle($options = [], $enclosedByLabel = TRUE)
    {
        if (isset($options['label']) && !isset($this->parts['{label}'])) {
            $this->parts['{label}'] = $options['label'];
            if (!empty($options['labelOptions'])) {
                $this->labelOptions = $options['labelOptions'];
            }
        }
        if ($enclosedByLabel) {
            $this->labelOptions     = ['class' => 'c006-block'];
            $this->parts['{input}'] = '
<div class="c006-activeform-toggle-container ' . BaseHtml::getInputId($this->model, $this->attribute) . '" >
    <span class="c006-activeform-toggle-on c006-activeform-on" ><span>ON</span></span>
    <span class="c006-activeform-toggle-off c006-activeform-off"><span>OFF</span></span>
    ' . Html::activeHiddenInput($this->model, $this->attribute, $this->inputOptions) . '
</div>
';
        } else {
            unset($options['labelOptions']);
            $options['label']       = NULL;
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

}
