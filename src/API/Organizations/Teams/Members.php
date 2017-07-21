<?php

/*
 * This file is part of Scrutinizer PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Scrutinizer\API\Organizations\Teams;

use BrianFaust\Http\HttpResponse;
use BrianFaust\Scrutinizer\API\AbstractAPI;

class Members extends AbstractAPI
{
    /**
     * @param string $organization
     * @param string $team
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function all(string $organization, string $team): HttpResponse
    {
        return $this->client->get("organizations/{$organization}/teams/{$team}/members");
    }

    /**
     * @param string $organization
     * @param string $team
     * @param string $email
     */
    public function add(string $organization, string $team, string $email): HttpResponse
    {
        return $this->client->put("organizations/{$organization}/teams/{$team}/members", compact('email'));
    }

    /**
     * @param string $organization
     * @param string $team
     * @param string $user
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function remove(string $organization, string $team, string $user): HttpResponse
    {
        return $this->client->delete("organizations/{$organization}/teams/{$team}/members/{$user}");
    }
}
