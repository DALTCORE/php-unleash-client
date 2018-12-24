<?php

namespace DALTCORE\Repository;

use DALTCORE\Model\FeatureModel;

class FeaturesRepository {

    private $features = [];

    /**
     * @param FeatureModel $feature
     */
    public function addFeature(FeatureModel $feature) {
        $this->features[] = $feature;
    }

    /**
     * Find a feature by name
     *
     * @param $name
     * @return mixed|null
     */
    public function findByName($name) {

        foreach ($this->features as $feature) {
            if($name === $feature->name) {
                return $feature;
            }
        }

        return (new FeatureModel(null));
    }
}