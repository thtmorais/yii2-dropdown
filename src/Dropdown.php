<?php

namespace thtmorais\dropdown;

use yii\base\Widget;

/**
 * Class Dropdown
 * @package thtmorais\dropdown
 */
class Dropdown extends Widget
{
    /**
     * @var string
     */
    public $dropdownToggleClass = 'btn btn-success';

    /**
     * @var array
     */
    public $main = [];

    /**
     * @var array
     */
    public $subordinate = [];

    /**
     * @var array
     */
    public $options = [];

    /**
     * {@inheritDoc}
     */
    public function run()
    {
        return $this->render('dropdown');
    }
}