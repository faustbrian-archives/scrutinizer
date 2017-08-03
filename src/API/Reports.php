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

class Reports extends AbstractAPI
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
            'github'    => "repositories/g/{$username}/$repo/reports",
            'bitbucket' => "repositories/b/{$username}/$repo/reports",
            'plain'     => "repositories/gp/$repo/reports",
        ][$type], $parameters);
    }

    /**
     * @param string $username
     * @param string $repo
     * @param string $date
     * @param string $type
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function details(string $username, string $repo, string $date, string $type): HttpResponse
    {
        return $this->client->get([
            'github'    => "repositories/g/{$username}/$repo/reports/{$date}",
            'bitbucket' => "repositories/b/{$username}/$repo/reports/{$date}",
            'plain'     => "repositories/gp/$repo/reports/{$date}",
        ][$type]);
    }
}
