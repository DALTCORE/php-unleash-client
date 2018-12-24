<?php

namespace DALTCORE\Model;

use DALTCORE\Exception\ObjectMissingException;

class FeatureModel {

    /**
     * Feature name
     *
     * @var null|string
     */
    public $name = null;

    /**
     * Feature description
     *
     * @var null|string
     */
    public $description = null;

    /**
     * Feature enabled
     *
     * @var bool
     */
    public $enabled = false;

    /**
     * Feature found
     *
     * @var bool
     */
    public $featureFound = false;

    /**
     * FeatureModel constructor.
     * @param $feature
     */
    public function __construct($feature)
    {
        if ($feature === null) {
            $this->name = "";
            $this->description = "";
            $this->enabled = false;
        } else {
            $this->name = (string)$feature->name;
            $this->description = (string)$feature->description;
            $this->enabled = (bool)$feature->enabled;
            $this->featureFound = true;
        }
    }

    /**
     * Magic getter for variables
     *
     * @param $name
     * @return bool|null|string
     * @throws ObjectMissingException
     */
    public function __get($name)
    {
        switch($name) {
            case 'name':
                return $this->name;
                break;
            case 'description':
                return $this->description;
                break;
            case 'enabled':
                return $this->enabled;
                break;
            case 'feature_found':
            case 'featurefound':
            case 'featureFound':
                return $this->featureFound;
                break;
            default:
                throw new ObjectMissingException($name);
                break;
        }
    }

    /**
     * Return boolean value of the feature
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Return boolean if the feature is not found
     *
     * @return bool
     */
    public function isFound()
    {
        return $this->featureFound === true;
    }

    /**
     * Return boolean if the feature is empty
     *
     * @return bool
     */
    public function isEmpty()
    {
        return $this->featureFound === false;
    }
}