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

namespace BrianFaust\Scrutinizer\API;

use BrianFaust\Http\HttpResponse;

class Inspections extends AbstractAPI
{
    /**
     * @param string $username
     * @param string $repo
     * @param string $type
     * @param array  $parameters
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function all(string $username, string $repo, string $type, array $parameters = []): HttpResponse
    {
        return $this->client->get([
            'github'    => "repositories/g/{$username}/$repo/inspections",
            'bitbucket' => "repositories/b/{$username}/$repo/inspections",
            'plain'     => "repositories/gp/$repo/inspections",
        ][$type], $parameters);
    }

    /**
     * @param string $username
     * @param string $repo
     * @param string $uuid
     * @param string $type
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function details(string $username, string $repo, string $uuid, string $type): HttpResponse
    {
        return $this->client->get([
            'github'    => "repositories/g/{$username}/$repo/inspections/$uuid",
            'bitbucket' => "repositories/b/{$username}/$repo/inspections/$uuid",
            'plain'     => "repositories/gp/$repo/inspections/$uuid",
        ][$type]);
    }

    /**
     * @param string $username
     * @param string $repo
     * @param string $type
     * @param array  $parameters
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function create(string $username, string $repo, string $type, array $parameters = []): HttpResponse
    {
        return $this->client->post([
            'github'    => "repositories/g/{$username}/$repo/inspections",
            'bitbucket' => "repositories/b/{$username}/$repo/inspections",
            'plain'     => "repositories/gp/$repo/inspections",
        ][$type], $parameters);
    }
}
