<?php

namespace DALTCORE;

use DALTCORE\Api\Client;
use DALTCORE\Client\Feature;
use DALTCORE\Exception\MissingParameterException;

class Unleash
{
    /**
     * Guzzle instance
     *
     * @var Client|null
     */
    protected $guzzle = null;

    /**
     * Unleash constructor.
     *
     * @param null $apiUrl
     * @param null $instanceId
     * @param null $applicationName
     *
     * @throws MissingParameterException
     */
    public function __construct($apiUrl = null, $instanceId = null, $applicationName = null)
    {
        if ($apiUrl === null || $apiUrl === "") {
            throw new MissingParameterException('apiUrl');
        }

        if ($instanceId === null || $instanceId === "") {
            throw new MissingParameterException('instanceId');
        }

        if ($applicationName === null || $applicationName === "") {
            throw new MissingParameterException('applicationName');
        }

        $client = new Client($apiUrl, $instanceId, $applicationName);
        $this->guzzle = $client->instance();
    }

    /**
     * Get a single or all features
     *
     * @param null (optional) $feature
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface|null
     */
    public function feature($feature = null)
    {
        return (new Feature($this->guzzle))->getFeature($feature);
    }
}
