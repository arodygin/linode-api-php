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
 * This class is autogenerated.
 *
 * @version Linode API v3.3
 */
class UserApi extends BaseLinodeApi
{
    /**
     * Authenticates a Linode Manager user against their username, password, and two-factor token (when enabled), and then returns a new API key, which can be used until it expires.
     * The number of active keys is limited to 20.
     *
     * @param string $username [required]
     * @param string $password [required]
     * @param string $token    [optional] Required when two-factor authentication is enabled.
     * @param int    $expires  [optional] Number of hours the key will remain valid, between 0 and 8760. 0 means no expiration. Defaults to 168.
     * @param string $label    [optional] An optional label for this key.
     *
     * @return array
     */
    public function getApiKey($username, $password, $token = null, $expires = null, $label = null)
    {
        return $this->call('user.getapikey', array(
            'username' => $username,
            'password' => $password,
            'token'    => $token,
            'expires'  => $expires,
            'label'    => $label,
        ));
    }
}
