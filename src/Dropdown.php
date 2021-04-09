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
    public string $dropdownToggleClass = 'btn btn-success';

    /**
     * @var array
     */
    public array $main = [];

    /**
     * @var array
     */
    public array $subordinate = [];

    /**
     * {@inheritDoc}
     */
    public function run()
    {
        return $this->render('dropdown');
    }
}