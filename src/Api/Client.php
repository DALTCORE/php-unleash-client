<?php

namespace DALTCORE\Api;

use GuzzleHttp\Client as HttpClient;

class Client
{
    /**
     * API URL to communicate
     *
     * @var string
     */
    protected $apiUrl = "";

    /**
     * Instance ID
     *
     * @var string
     */
    protected $instanceId = "";

    /**
     * Application name
     *
     * @var string
     */
    protected $applicationName = "";

    /**
     * Guzzle Client constructor.
     *
     * @param null $apiUrl
     * @param null $instanceId
     * @param null $applicationName
     */
    public function __construct($apiUrl = null, $instanceId = null, $applicationName = null)
    {
        $this->apiUrl = $apiUrl;
        $this->instanceId = $instanceId;
        $this->applicationName = $applicationName;
    }

    /**
     * Return a fresh instance of Guzzle
     *
     * @return HttpClient
     */
    public function instance() : HttpClient
    {
        $client = new HttpClient([
            'base_uri' => $this->apiUrl,
            'headers', [
                'UNLEASH-APPNAME' => $this->applicationName,
                'UNLEASH-INSTANCEID' => $this->instanceId,
            ]
        ]);

        dd($client->getConfig());

        return $client;
    }
}
