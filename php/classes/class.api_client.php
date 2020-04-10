<?php

/**
 * Coyote API Client Class
 * @author Job van Achterberg
 * @category class
 * @package CoyotePlugin/Clients
 * @since 1.0
 */

use GuzzleHttp\Client;

namespace Coyote;

class ApiClient {
    /**
     * CoyoteApiCLient constructor
     * 
     * @param string endpoint the endpoint the API is located at
     * @param string authKey API authentication key
     * @param int organizationId API organization Id
     * @param int apiVersion API version to use
     */

    private $organizationId;
    private $httpClient;

    public function __construct(string $endpoint, string $token, int $organizationId, int $apiVersion = 1) {
        $this->httpClient = new \GuzzleHttp\Client([
            'base_uri' => ($endpoint . '/api/' . 'v' . $apiVersion . '/'),
            'timeout'  => 2.0,
            'headers' => ['Authorization' => $token]
        ]);

        $this->organizationId = $organizationId;
    }

    public function createNewResource(object $resource) {
        $response = $this->httpClient->post('/resource', $resource, );
    }

    public function getResource(int $resourceId) {
        $response = $this->httpClient->get('resources/' . $resourceId);
    }
}