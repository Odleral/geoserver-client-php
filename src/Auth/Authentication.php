<?php
/*
 *    GeoServer PHP Client
 *
 *    Copyright (c) 2018 Oneoff-tech UG, Germany, www.oneofftech.xyz
 *
 *    This program is Free Software: you can redistribute it and/or modify
 *    it under the terms of the GNU Affero General Public License as
 *    published by the Free Software Foundation, either version 3 of the
 *    License, or (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU Affero General Public
 *    License along with this program.  If not, see
 *    <http://www.gnu.org/licenses/>.
 */

namespace OneOffTech\GeoServer\Auth;

use Psr\Http\Message\RequestInterface;
use Http\Message\Authentication\BasicAuth;
use OneOffTech\GeoServer\Contracts\Authentication as AuthenticationContract;

final class Authentication implements AuthenticationContract
{
    /**
     * @var Http\Message\Authentication\BasicAuth
     */
    private $auth;

    /**
     * @param string $app_secret
     * @param string $app_url
     */
    public function __construct($username, $password)
    {
        $this->auth = new BasicAuth($username, $password);
    }

    /**
     * {@inheritdoc}
     */
    public function authenticate(RequestInterface $request)
    {
        return $this->auth->authenticate($request);
    }
}
