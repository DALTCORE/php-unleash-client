<?php

namespace DALTCORE;

use DALTCORE\Api\Client as UnleashClient;
use DALTCORE\Exception\MissingParameterException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

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

        $client = new UnleashClient($apiUrl, $instanceId, $applicationName);
        $this->guzzle = $client->instance();
    }

    /**
     * Get a single or all features
     *
     * @param null (optional) $feature
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface|null
     */
    public function feature() {
        $response = $this->guzzle->get('');

        dd($response);

        return $response->getBody()->getContents() ?? null;
    }
}
