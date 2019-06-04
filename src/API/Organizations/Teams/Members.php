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

namespace Plients\Scrutinizer\API\Organizations\Teams;

use Plients\Http\HttpResponse;
use Plients\Scrutinizer\API\AbstractAPI;

class Members extends AbstractAPI
{
    /**
     * @param string $organization
     * @param string $team
     *
     * @return \Plients\Http\HttpResponse
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
     * @return \Plients\Http\HttpResponse
     */
    public function remove(string $organization, string $team, string $user): HttpResponse
    {
        return $this->client->delete("organizations/{$organization}/teams/{$team}/members/{$user}");
    }
}
