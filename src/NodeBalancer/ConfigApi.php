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

namespace Linode\NodeBalancer;

use Linode\BaseLinodeApi;

/**
 * This class is autogenerated.
 *
 * @version Linode API v3.3
 */
class ConfigApi extends BaseLinodeApi
{
    /**
     * @param int    $NodeBalancerID [required] The parent NodeBalancer's ID
     * @param int    $Port           [optional] Port to bind to on the public interfaces. 1-65534
     * @param string $Protocol       [optional] Either 'tcp', 'http', or 'https'
     * @param string $Algorithm      [optional] Balancing algorithm.  One of 'roundrobin', 'leastconn', 'source'
     * @param string $Stickiness     [optional] Session persistence.  One of 'none', 'table', 'http_cookie'
     * @param string $check          [optional] Perform active health checks on the backend nodes.  One of 'connection', 'http', 'http_body'
     * @param int    $check_interval [optional] Seconds between health check probes.  2-3600
     * @param string $check_timeout  [optional] Seconds to wait before considering the probe a failure. 1-30.  Must be less than check_interval.
     * @param string $check_attempts [optional] Number of failed probes before taking a node out of rotation. 1-30
     * @param string $check_path     [optional] When check=http, the path to request
     * @param string $check_body     [optional] When check=http, a regex to match within the first 16,384 bytes of the response body
     * @param string $ssl_cert       [optional] SSL certificate served by the NodeBalancer when the protocol is 'https'
     * @param string $ssl_key        [optional] Unpassphrased private key for the SSL certificate when protocol is 'https'
     *
     * @return array
     */
    public function create($NodeBalancerID, $Port = null, $Protocol = null, $Algorithm = null, $Stickiness = null, $check = null, $check_interval = null, $check_timeout = null, $check_attempts = null, $check_path = null, $check_body = null, $ssl_cert = null, $ssl_key = null)
    {
        return $this->call('nodebalancer.config.create', array(
            'NodeBalancerID' => $NodeBalancerID,
            'Port'           => $Port,
            'Protocol'       => $Protocol,
            'Algorithm'      => $Algorithm,
            'Stickiness'     => $Stickiness,
            'check'          => $check,
            'check_interval' => $check_interval,
            'check_timeout'  => $check_timeout,
            'check_attempts' => $check_attempts,
            'check_path'     => $check_path,
            'check_body'     => $check_body,
            'ssl_cert'       => $ssl_cert,
            'ssl_key'        => $ssl_key,
        ));
    }

    /**
     * Deletes a NodeBalancer's Config.
     *
     * @param int $NodeBalancerID [required]
     * @param int $ConfigID       [required] The ConfigID to delete
     *
     * @return array
     */
    public function delete($NodeBalancerID, $ConfigID)
    {
        return $this->call('nodebalancer.config.delete', array(
            'NodeBalancerID' => $NodeBalancerID,
            'ConfigID'       => $ConfigID,
        ));
    }

    /**
     * Returns a list of NodeBalancers this user has access or delete to, including their properties.
     *
     * @param int $NodeBalancerID [required]
     * @param int $ConfigID       [optional] Limits the list to the specified ConfigID
     *
     * @return array
     */
    public function getList($NodeBalancerID, $ConfigID = null)
    {
        return $this->call('nodebalancer.config.list', array(
            'NodeBalancerID' => $NodeBalancerID,
            'ConfigID'       => $ConfigID,
        ));
    }

    /**
     * Updates a Config's properties.
     *
     * @param int    $ConfigID       [required]
     * @param int    $Port           [optional] Port to bind to on the public interfaces. 1-65534
     * @param string $Protocol       [optional] Either 'tcp', 'http', or 'https'
     * @param string $Algorithm      [optional] Balancing algorithm.  One of 'roundrobin', 'leastconn', 'source'
     * @param string $Stickiness     [optional] Session persistence.  One of 'none', 'table', 'http_cookie'
     * @param string $check          [optional] Perform active health checks on the backend nodes.  One of 'connection', 'http', 'http_body'
     * @param int    $check_interval [optional] Seconds between health check probes.  2-3600
     * @param string $check_timeout  [optional] Seconds to wait before considering the probe a failure. 1-30.  Must be less than check_interval.
     * @param string $check_attempts [optional] Number of failed probes before taking a node out of rotation. 1-30
     * @param string $check_path     [optional] When check=http, the path to request
     * @param string $check_body     [optional] When check=http, a regex to match within the first 16,384 bytes of the response body
     * @param string $ssl_cert       [optional] SSL certificate served by the NodeBalancer when the protocol is 'https'
     * @param string $ssl_key        [optional] Unpassphrased private key for the SSL certificate when protocol is 'https'
     *
     * @return array
     */
    public function update($ConfigID, $Port = null, $Protocol = null, $Algorithm = null, $Stickiness = null, $check = null, $check_interval = null, $check_timeout = null, $check_attempts = null, $check_path = null, $check_body = null, $ssl_cert = null, $ssl_key = null)
    {
        return $this->call('nodebalancer.config.update', array(
            'ConfigID'       => $ConfigID,
            'Port'           => $Port,
            'Protocol'       => $Protocol,
            'Algorithm'      => $Algorithm,
            'Stickiness'     => $Stickiness,
            'check'          => $check,
            'check_interval' => $check_interval,
            'check_timeout'  => $check_timeout,
            'check_attempts' => $check_attempts,
            'check_path'     => $check_path,
            'check_body'     => $check_body,
            'ssl_cert'       => $ssl_cert,
            'ssl_key'        => $ssl_key,
        ));
    }
}
