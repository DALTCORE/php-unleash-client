<?php

namespace DADLTCORE;

use DALTCORE\Interfaces\FeatureInterface;

class Feature extends FeatureInterface
{
    /**
     * Feature constructor.
     *
     * @param null $name
     * @param null $enabled
     */
    public function __construct($name = null, $enabled = null)
    {
        $this->name = $name;
        $this->enabled = $enabled;
    }
}