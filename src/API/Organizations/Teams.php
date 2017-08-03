<?php

declare(strict_types=1);

/*
 * This file is part of Scrutinizer PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Scrutinizer\API\Organizations;

use BrianFaust\Http\HttpResponse;
use BrianFaust\Scrutinizer\API\AbstractAPI;

class Teams extends AbstractAPI
{
    /**
     * @param string $organization
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function all(string $organization): HttpResponse
    {
        return $this->client->get("organizations/{$organization}/teams");
    }

    /**
     * @param string $organization
     * @param string $name
     */
    public function add(string $organization, string $name): HttpResponse
    {
        return $this->client->post("organizations/{$organization}/teams", compact('name'));
    }

    /**
     * @param string $organization
     * @param string $team
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function remove(string $organization, string $team): HttpResponse
    {
        return $this->client->delete("organizations/{$organization}/teams/{$team}");
    }
}
