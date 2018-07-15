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
 * Basic class which can make calls to Linode API.
 */
class BaseLinodeApi
{
    /** @var string API key */
    protected $key;

    /** @var \Linode\Batch */
    protected $batch;

    /** @var array Additional cURL options. */
    protected $options;

    /** @var bool Whether the object is in debug mode */
    protected $debug;

    /**
     * Constructor.
     *
     * @param string|Batch $key     API key, or batch of requests
     * @param array        $options Additional cURL options to be set.
     * @param bool         $debug   Whether the object should be in debug mode
     */
    public function __construct($key, array $options = [], $debug = false)
    {
        if ($key instanceof Batch) {
            $this->batch = $key;
        }
        else {
            $this->key   = $key;
            $this->batch = null;
        }

        $this->options = $options;
        $this->debug   = $debug;
    }

    /**
     * Performs specified call to Linode API.
     *
     * @param string $action
     * @param array  $parameters
     *
     * @throws LinodeException
     * @throws \Exception
     *
     * @return array|bool
     */
    protected function call($action, array $parameters = [])
    {
        if ($this->batch) {

            $query = ['api_action' => $action];

            foreach ($parameters as $key => $value) {
                if ($value !== null) {
                    $query[urlencode($key)] = urlencode($value);
                }
            }

            $this->batch->addRequest($query);

            return true;
        }

        $curl = curl_init();

        if (!$curl) {
            return false;
        }

        $query = "api_key={$this->key}&api_action={$action}";

        foreach ($parameters as $key => $value) {
            if ($value !== null) {
                $query .= sprintf('&%s=%s', urlencode($key), urlencode($value));
            }
        }

        if ($this->debug) {
            return $query;
        }

        $this->options[CURLOPT_URL]            = 'https://api.linode.com/';
        $this->options[CURLOPT_POST]           = true;
        $this->options[CURLOPT_POSTFIELDS]     = $query;
        $this->options[CURLOPT_RETURNTRANSFER] = true;
        $this->options[CURLOPT_SSLVERSION]     = CURL_SSLVERSION_TLSv1_2;

        curl_setopt_array($curl, $this->options);

        $result = curl_exec($curl);

        curl_close($curl);

        $json = json_decode($result, true);

        if (!$json) {
            throw new \RuntimeException('Empty response');
        }

        $error = reset($json['ERRORARRAY']);

        if ($error) {
            throw new LinodeException($error['ERRORMESSAGE'], $error['ERRORCODE']);
        }

        return $json['DATA'];
    }
}
