<?php

declare(strict_types=1);

/*
 * This file is part of Scrutinizer PHP Client.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plients\Scrutinizer\API\Organizations;

use Plients\Http\HttpResponse;
use Plients\Scrutinizer\API\AbstractAPI;

class Members extends AbstractAPI
{
    /**
     * @param string $organization
     *
     * @return \Plients\Http\HttpResponse
     */
    public function all(string $organization): HttpResponse
    {
        return $this->client->get("organizations/{$organization}/members");
    }

    /**
     * @param string $organization
     * @param string $email
     * @param string $role
     */
    public function add(string $organization, string $email, string $role): HttpResponse
    {
        return $this->client->put("organizations/{$organization}/members", compact('email', 'role'));
    }

    /**
     * @param string $organization
     * @param string $user
     *
     * @return \Plients\Http\HttpResponse
     */
    public function remove(string $organization, string $user): HttpResponse
    {
        return $this->client->delete("organizations/{$organization}/members/{$user}");
    }
}
