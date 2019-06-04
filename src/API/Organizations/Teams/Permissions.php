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

class Permissions extends AbstractAPI
{
    /**
     * @param string $organization
     * @param string $team
     *
     * @return \Plients\Http\HttpResponse
     */
    public function all(string $organization, string $team): HttpResponse
    {
        return $this->client->get("organizations/{$organization}/teams/{$team}/permissions");
    }

    /**
     * @param string $organization
     * @param string $team
     * @param string $username
     * @param string $repo
     * @param string $access
     * @param string $type
     *
     * @return \Plients\Http\HttpResponse
     */
    public function add(string $organization, string $team, string $username, string $repo, string $access, string $type): HttpResponse
    {
        return $this->client->put([
            'github'    => "organizations/{$organization}/teams/{$team}/permissions/g/{$username}/{$repo}",
            'bitbucket' => "organizations/{$organization}/teams/{$team}/permissions/b/{$username}/{$repo}",
            'plain'     => "organizations/{$organization}/teams/{$team}/permissions/gp/{$repo}",
        ][$type], $access);
    }

    /**
     * @param string $slug
     * @param string $team
     * @param string $username
     * @param string $repo
     * @param string $type
     *
     * @return \Plients\Http\HttpResponse
     */
    public function remove(string $slug, string $team, string $username, string $repo, string $type): HttpResponse
    {
        return $this->client->delete([
            'github'    => "organizations/{$slug}/teams/{$team}/permissions/g/{$username}/{$repo}",
            'bitbucket' => "organizations/{$slug}/teams/{$team}/permissions/b/{$username}/{$repo}",
            'plain'     => "organizations/{$slug}/teams/{$team}/permissions/gp/{$repo}",
        ][$type]);
    }
}
