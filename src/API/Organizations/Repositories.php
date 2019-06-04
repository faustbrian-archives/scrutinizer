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
use Plients\Scrutinizer\Models\Repository;

class Repositories extends AbstractAPI
{
    /**
     * @param string $organization
     * @param array  $parameters
     *
     * @return \Plients\Http\HttpResponse
     */
    public function all(string $organization, array $parameters = []): HttpResponse
    {
        return $this->client->get("organizations/{$organization}/repositories", $parameters);
    }

    /**
     * @param string $organization
     * @param string $repository
     */
    public function add(string $organization, string $repository): HttpResponse
    {
        return $this->client->put("organizations/{$organization}/repositories", [
            'repository' => $repository,
        ]);
    }

    /**
     * @param string $organization
     * @param string $username
     * @param string $repo
     * @param string $type
     *
     * @return \Plients\Http\HttpResponse
     */
    public function remove(string $organization, string $username, string $repo, string $type): HttpResponse
    {
        return $this->client->delete([
            'github'    => "organizations/{$organization}/repositories/g/{$username}/{$repo}",
            'bitbucket' => "organizations/{$organization}/repositories/b/{$username}/{$repo}",
            'plain'     => "organizations/{$organization}/repositories/gp/{$repo}",
        ][$type]);
    }
}
