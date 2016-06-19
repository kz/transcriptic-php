<?php

namespace Kz\Transcriptic;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

/**
 * Class Transcriptic
 * @package Kz\Transcriptic
 */
class Transcriptic
{
    const API_URL = 'https://secure.transcriptic.com';

    /**
     * @var Client
     */
    private $client;

    /**
     * Instantiates the Guzzle client using the authorization token.
     * A token can be obtained at: https://secure.transcriptic.com/users/edit
     *
     * @param string $email User email for the Transcriptic API.
     * @param string $token User token for the Transcriptic API.
     */
    public function __construct($email, $token)
    {
        $client = new Client([
            'base_uri' => self::API_URL . '/',
            'headers' => [
                'X-User-Email' => $email,
                'X-User-Token' => $token
            ],
        ]);
        $this->client = $client;
    }


    /**
     * Sends a request to the Transcriptic API.
     *
     * @param $request
     * @param array $options
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function sendRequest($request, $options = [])
    {
        $client = $this->client;
        $response = $client->send($request, $options);

        return $response;
    }

    /**
     * Creates a project
     * @link https://developers.transcriptic.com/docs/project-creation-quickstart
     *
     * @param string $organization Organization ID, found in the organization URL. Required.
     * @param string $name Name of project to be created. Required.
     * @return \Psr\Http\Message\StreamInterface
     */
    public function createProject($organization, $name)
    {
        $request = new Request('POST', $organization);
        $response = $this->sendRequest($request, [
            'query' => [
                'name' => $name,
            ]
        ]);

        return $response->getBody();
    }

    /**
     * Gets a list of all runs in a project
     * @link https://developers.transcriptic.com/docs/get-all-runs-in-a-project
     *
     * @param string $organization Organization ID, found in the organization URL. Required.
     * @param string $project Project ID. Required.
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getRuns($organization, $project)
    {
        $request = new Request('GET', $organization . '/' . $project . '/runs');
        $response = $this->sendRequest($request);

        return $response->getBody();
    }

    /**
     * Creates a run
     * @link https://developers.transcriptic.com/docs/create-a-run
     * Launch request IDs are not currently supported
     *
     * @param string $organization Organization ID, found in the organization URL. Required.
     * @param string $project Project ID. Required.
     * @param object $protocol Protocol object. If submitting from a launch request, this can be omitted. Required.
     * @param string $title Title of run. Required.
     * @param bool $testMode Whether test mode is enabled. Defaults to false. Optional.
     * @return \Psr\Http\Message\StreamInterface
     */
    public function createRun($organization, $project, $protocol, $title, $testMode = false)
    {
        $request = new Request('POST', $organization . '/' . $project . '/runs');
        $response = $this->sendRequest($request, [
            'query' => [
                'protocol' => $protocol,
                'title' => $title,
                'test_mode' => $testMode
            ]
        ]);

        return $response->getBody();
    }

    /**
     * Gets a single run
     * @link https://developers.transcriptic.com/docs/get-run-status
     *
     * @param string $organization Organization ID, found in the organization URL. Required.
     * @param string $project Project ID. Required.
     * @param string $run Run ID. Required.
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getRun($organization, $project, $run)
    {
        $request = new Request('GET', $organization . '/' . $project . '/runs/' . $run);
        $response = $this->sendRequest($request);

        return $response->getBody();
    }

    /**
     * Gets a container
     * @link https://developers.transcriptic.com/docs/view-a-container
     *
     * @param string $organization Organization ID, found in the organization URL. Required.
     * @param string $container Container ID. Required.
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getContainer($organization, $container)
    {
        $request = new Request('GET', $organization . '/samples/' . $container);
        $response = $this->sendRequest($request);

        return $response->getBody();
    }

    /**
     * Gets a single Aliquot
     * @link https://developers.transcriptic.com/docs/view-an-aliquot
     *
     * @param string $organization Organization ID, found in the organization URL. Required.
     * @param string $container Container ID. Required.
     * @param string $wellIndex Well index. Numeric (0-indexed) or alphanumeric (e.g. "A1"). Required.
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getAliquot($organization, $container, $wellIndex)
    {
        $request = new Request('GET', $organization . '/samples/' . $container . '/' . $wellIndex);
        $response = $this->sendRequest($request);

        return $response->getBody();
    }

    /**
     * Gets a list of all packaged protocols available in an organization
     * @link https://developers.transcriptic.com/docs/get-all-protocols
     *
     * @param string $organization Organization ID, found in the organization URL. Required.
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getProtocols($organization)
    {
        $request = new Request('GET', $organization . '/protocols.json');
        $response = $this->sendRequest($request);

        return $response->getBody();
    }

    /**
     * Gets a single protocol
     * @link https://developers.transcriptic.com/docs/get-a-single-protocol
     *
     * @param string $organization Organization ID, found in the organization URL. Required.
     * @param string $protocol Protocol ID. Required.
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getProtocol($organization, $protocol)
    {
        $request = new Request('GET', $organization . '/protocols/' . $protocol . '.json');
        $response = $this->sendRequest($request);

        return $response->getBody();
    }

    /**
     * Get a dataset
     * @link https://developers.transcriptic.com/docs/datasetsdataset_id
     *
     * @param string $dataset Dataset ID. Required.
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getDataset($dataset)
    {
        $request = new Request('GET', 'datasets/' . $dataset . '.json');
        $response = $this->sendRequest($request);

        return $response->getBody();
    }

}
