<?php

namespace DALTCORE\Interfaces;

abstract class FeatureInterface
{
    /** @var string */
    public $name;

    /** @var string */
    public $description;

    /** @var bool */
    public $enabled;

    /** @var array */
    public $strategies;
}