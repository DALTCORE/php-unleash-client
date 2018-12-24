<?php

namespace DALTCORE\Client;

use DALTCORE\Model\FeatureModel;
use DALTCORE\Repository\FeaturesRepository;
use GuzzleHttp\Client;

class Feature
{
    /**
     * @var Client|null
     */
    protected $client = null;

    /**
     * Feature constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get all or just a single feature
     *
     * @param null $feature
     * @return FeaturesRepository|mixed|null
     */
    public function getFeature($feature = null)
    {
        $response = $this->client->request('GET', 'features');

        $jsonResponse = json_decode($response->getBody()->getContents());

        $featuresRepository = new FeaturesRepository();
        foreach($jsonResponse->features as $featureItem) {
            $featuresRepository->addFeature((new FeatureModel($featureItem)));
        }
        
        if ($feature === null) {
            return $featuresRepository;
        }

        return $featuresRepository->findByName($feature);
    }
}
