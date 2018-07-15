<?php

//----------------------------------------------------------------------
//
//  Copyright (C) 2015 Artem Rodygin
//
//  This file is part of Linode API Client Library for PHP.
//
//  You should have received a copy of the MIT License along with
//  the library. If not, see <http://opensource.org/licenses/MIT>.
//
//----------------------------------------------------------------------

namespace Linode;

/**
 * A batch of requests.
 */
class Batch
{
    /** @var string API key */
    protected $key;

    /** @var array Batched requests */
    protected $requests;

    /**
     * Constructor.
     *
     * @param string $key
     */
    public function __construct($key)
    {
        $this->key      = $key;
        $this->requests = [];
    }

    /**
     * Adds specified request to the batch.
     *
     * @param array $query Request parameters
     */
    public function addRequest($query)
    {
        $this->requests[] = $query;
    }

    /**
     * Performs a call for currently batched requests.
     *
     * @param bool $debug Whether make a call in a debug mode
     *
     * @throws \Exception
     *
     * @return array|string|false Array of results (or query string in debug mode)
     */
    public function execute($debug = false)
    {
        if (count($this->requests) === 0) {
            return false;
        }

        $curl = curl_init();

        if (!$curl) {
            return false;
        }

        $query = "api_key={$this->key}&api_action=batch&api_requestArray=" . json_encode($this->requests);

        $this->requests = [];

        if ($debug) {
            return $query;
        }

        curl_setopt($curl, CURLOPT_URL, 'https://api.linode.com/');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);

        $result = curl_exec($curl);

        curl_close($curl);

        $json = json_decode($result, true);

        if (!$json) {
            throw new \RuntimeException('Empty response');
        }

        return $json;
    }
}
